<template>
    <form class="zakaz_form" action="">
        <zakaz-dictors v-model="select_diktors" :multi="multiselect"></zakaz-dictors>
        <div class="quill_wrapper">
            <label for="">Введите текст для диктора<span class="required">*</span></label>
            <quill-editor
                ref="diktor_text_editor"
                theme="snow"
                contentType="html"
                :toolbar="['bold', 'italic', 'underline']"
                v-model:content="content"
                @textChange="diktorTextChenge"
                placeholder="Введите текст ДЛЯ ДИКТОРА. Важно! Текст заказа должен быть введён именно в это поле, а не в прикреплённом к письму текстовом файле"
                ></quill-editor>
        </div>


        <label for="type_calc">Требуемый хронометраж</label>
        <input v-model="wonted_chrono" type="number" id="wonted_chrono">

        <div class="coll2">
            <div class="col">
                <div class="elem_wripper">
                    <zakaz-select label="Выберите тип:" :list="zak_type_list" v-model="zak_type" ></zakaz-select>
                </div>

                <div class="elem_wripper" v-show="zak_type == 'Голос'">
                    <zakaz-select  label="Обработка:" :list="zak_obr_type_list" v-model="zak_obr_type" ></zakaz-select>
                </div>
                <p class="information" v-show="zak_type == 'IVR'">Расчет ведется за каждый элемент IVR а не по общему хронометража</p>
                <div class="elem_wripper" v-show="zak_type == 'IVR'">
                    <zakaz-select  label="Дополнительно:" :list="zak_irv_type_list" v-model="zak_irv_type" ></zakaz-select>
                </div>
            </div>

            <div class="col">
                <div class="chrono_text">
                    <h3>Хронометраж</h3>
                    <p v-html="result_text"></p>
                </div>
            </div>
        </div>

        <div class="chrono_text chrono_text_price">
            <h3>Цена:</h3>
            <p>{{ zak_price }} <span v-show="zak_price !== 'Индивидуальный расссчет'">₽</span></p>
        </div>

        <div class="quill_wrapper">
            <label for="">Введите комментарий к заказу</label>
            <quill-editor
                theme="snow"
                contentType="html"
                :toolbar="['bold', 'italic', 'underline']"
                v-model:content="comment"
                ></quill-editor>
        </div>

        <label for="file">Прикрепите файл</label>
        <input type="file" accept="audio/*" id="file" ref="lfile">



        <label for="type_calc">Введите ваш email<span class="required">*</span></label>
        <input v-model="email" type="text" id="email">

        <label for="type_calc">Введите ваш телефон</label>
        <input v-model="phone" type="text" id="phone">

        <div class="error_list">
            <div v-for="(item, index) in error_list" :key="index" class="error">
                {{ item }}
            </div>
        </div>
        <div class="chrono_form__control_panel">
            <button @click.prevent="sendOrder">Отправить</button>
        </div>
    </form>
</template>

<script>
import {  watch, ref } from 'vue';
import { useStore } from 'vuex'

import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import ZakazSelect from './ZakazSelect.vue';
import ZakazDictors from './ZakazDictors.vue';

import {  correctHronoText, formatResult } from '../Hrono.js'
import { calcHronoTime } from '../HronoDopCalc.js'

export default {
    components:{
    QuillEditor,
    ZakazSelect,
    ZakazDictors
},

    setup() {

        let email = ref("");
        let phone = ref("");

        let content = ref("");
        let comment = ref("");
        let zak_type = ref("Голос")
        let zak_type_list = ["Голос", "Ролик", "IVR"]

        let zak_obr_type = ref("Без обработки")
        let zak_obr_type_list = ["Без обработки", "Базовые обработки", "Почистить в один дубль"]

        let zak_irv_type = ref("Без музыки")
        let zak_irv_type_list = ["Без музыки", "С музыкой"]

        let select_diktors = ref([])

        let result_text = ref('Стандартный:<br/>Игровой:<br/>Медленный: <br/> Страниц текста всего:')

        let zak_price = ref("0")
        let wonted_chrono = ref("0")

        let standart_chrono = ref(0)
        let multiselect = ref(true)

        let hronoDelta = document.querySelector('meta[name="chrono_correct"]').content;

        const store = useStore()

        watch(() => zak_type.value, function() {
            select_diktors.value = []
            multiselect.value = zak_type.value !== "IVR"
        });

        watch(() => [zak_type.value, zak_obr_type.value, select_diktors, zak_irv_type.value.length, standart_chrono.value], function() {
            allCalcPrice()
        });

        // watch(() => select_diktors.value.length, function() {
        //     allCalcPrice()
        //     console.log(select_diktors.length)
        // });

        watch(() => select_diktors.value, () => {
            allCalcPrice()
            console.log(select_diktors.length)
        },
        {deep: true}
        );


        const allCalcPrice = () => {
            zak_price.value = "0"
            if (zak_type.value == "Голос") zak_price.value = golosCalc(standart_chrono.value, zak_obr_type.value, select_diktors.value)
            if (zak_type.value == "Ролик") zak_price.value = golosRolik(standart_chrono.value, select_diktors.value)
            if (zak_type.value == "IVR") zak_price.value = golosIVR(standart_chrono.value, zak_irv_type.value, select_diktors.value)

            if (zak_price.value == "-1") zak_price.value = "Индивидуальный расссчет"
        }

        const golosCalc = (hrono ,dop, diktors) => {
            if (hrono == 0) return 0
            let total = 0
            for (let diktor_index in store.getters.dictors) {
                let diktor = store.getters.dictors[diktor_index]

                if (!diktors.includes(diktor.name)) continue;

                let chenge = false

                for (let price_interval_index in diktor.price_table) {

                    let price_interval = diktor.price_table[price_interval_index]

                    if ((hrono >= price_interval.start) && (hrono<=price_interval.finish)) {

                        if (dop == "Без обработки") total += parseFloat(price_interval.system_cost)
                        if (dop == "Базовые обработки") total += parseFloat(price_interval.obr_standatr)
                        if (dop == "Почистить в один дубль") total += parseFloat(price_interval.obr_one)

                        chenge = true
                    }

                }

                if (chenge == false) {
                    total = -1
                    // if (dop == "Без обработки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].system_cost)
                    // if (dop == "Базовые обработки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].obr_standatr)
                    // if (dop == "Почистить в один дубль") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].obr_one)
                }


            }

                return total
        }

        const golosIVR = (hrono ,dop, diktors) => {
            if (hrono == 0) return 0
            let total = 0
            for (let diktor_index in store.getters.dictors) {
                let diktor = store.getters.dictors[diktor_index]

                if (!diktors.includes(diktor.name)) continue;

                let chenge = false

                for (let price_interval_index in diktor.price_table) {

                    let price_interval = diktor.price_table[price_interval_index]

                    if ((hrono >= price_interval.start) && (hrono<=price_interval.finish)) {

                        if (dop == "Без музыки") total += parseFloat(price_interval.ivr_cost)
                        if (dop == "С музыкой") total += parseFloat(price_interval.ivr_music_cost)

                        chenge = true
                    }

                }

                if (chenge == false) {
                    total = -1
                    // if (dop == "Без музыки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].ivr_cost)
                    // if (dop == "С музыкой") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].ivr_music_cost)
                }


            }

                return total
        }

        const golosRolik = (hrono, diktors) => {
            if (hrono == 0) return 0
            let max_price = -1
            let name = ""

            for (let diktor_index in store.getters.dictors) {
                let diktor = store.getters.dictors[diktor_index]

                if (!diktors.includes(diktor.name)) continue;


                for (let price_interval_index in diktor.price_table) {

                    let price_interval = diktor.price_table[price_interval_index]

                    if ((hrono >= price_interval.start) && (hrono<=price_interval.finish)) {

                        if (parseFloat(price_interval.sample_cost) > max_price)
                            {
                                max_price = parseFloat(price_interval.sample_cost)
                                name = diktor.name
                            }
                    }

                }

            }

            for (let diktor_index in store.getters.dictors) {
                let diktor = store.getters.dictors[diktor_index]

                if (!diktors.includes(diktor.name)) continue;
                if (diktor.name == name) continue;


                for (let price_interval_index in diktor.price_table) {

                    let price_interval = diktor.price_table[price_interval_index]

                    if ((hrono >= price_interval.start) && (hrono<=price_interval.finish)) {

                        max_price += parseFloat(price_interval.dop_cost)

                    }

                }

            }



            return max_price
        }


        const diktorTextChenge = () => {
            let clear_text = diktor_text_editor.value.getText().trim()
            let result = calcHronoTime(correctHronoText(clear_text))

            let tmpStandartChrono = result.standart + Math.round((result.standart / 100)*hronoDelta);
            let tmpGameChrono = result.game + Math.round((result.game / 100)*hronoDelta);
            let tmpSlowChrono = result.slow + Math.round((result.slow / 100)*hronoDelta);
            let tmpChronoText = 'Стандартный: '+ formatResult(tmpStandartChrono) +'<br/>Игровой: '+ formatResult(tmpGameChrono) +'<br/>Медленный: '+ formatResult(tmpSlowChrono) +'<br/> Страниц текста всего: '+result.pages

            // console.log(formatResult(tmpStandartChrono) )
            // console.log(tmpStandartChrono)

            console.log(result)
            console.log(clear_text)

            result_text.value = tmpChronoText
            standart_chrono.value = tmpStandartChrono
            wonted_chrono.value = tmpStandartChrono
        }

        const diktor_text_editor = ref(null)
        const lfile = ref(null)

        const sendOrder = () => {
            error_list.value = []
            if (content.value == "") error_list.value.push("Напишите текст для диктора")
            if (select_diktors.value.length == 0) error_list.value.push("Выберите диктора")
            if (email.value == "") error_list.value.push("Введите электронную почту")

            if (error_list.value.length != 0 ) return;

            let sendet_data = new FormData()

            sendet_data.append("_token", document.querySelector('meta[name="_token"]').content)
            sendet_data.append('content', content.value)
            sendet_data.append('comment', comment.value)
            sendet_data.append('zak_type', zak_type.value)
            sendet_data.append('obrabotka', zak_obr_type.value)
            sendet_data.append('irv_muz', zak_irv_type.value)
            sendet_data.append('price', zak_price.value)
            sendet_data.append("email", email.value)
            sendet_data.append("wonted_chrono", wonted_chrono.value)
            sendet_data.append("phone", phone.value)
            sendet_data.append('standart_chrono', standart_chrono.value)
            if (lfile.value.files[0])
                sendet_data.append("files", lfile.value.files[0])
            else
                sendet_data.append("files", "")

            for (var i = 0; i < select_diktors.value.length; i++) {
                sendet_data.append('diktors[]', select_diktors.value[i]);
            }

            axios.post("/create_order", sendet_data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            )
            .then((response) => {
                console.log(response)
                if (response.data.id != undefined) {
                    document.location.href = "/thencs?uniq_code="+response.data.uniq_code
                } else alert("Произошла ошибка попробуйте еще раз!")
            })
            .catch( error => {
                console.log(error)
                alert("Произошла ошибка попробуйте еще раз!")
            });

        }

        let error_list = ref([])

        return {
            content,
            comment,
            zak_type,
            zak_type_list,
            zak_obr_type,
            result_text,
            zak_obr_type_list,

            zak_irv_type,
            zak_irv_type_list,
            wonted_chrono,

            multiselect,


            diktor_text_editor,
            lfile,
            select_diktors,
            zak_price,
            email,
            phone,
            error_list,
            diktorTextChenge,
            sendOrder
        }
    }
}
</script>

<style>

</style>
