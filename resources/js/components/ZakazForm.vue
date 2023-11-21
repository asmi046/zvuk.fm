<template>
    <form class="zakaz_form" action="">
        <zakaz-dictors v-model="select_diktors" :multi="multiselect"></zakaz-dictors>
        <div class="quill_wrapper">
            <label for="">Введите текст для диктора</label>
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

        <div class="coll2">
            <div class="col">
                <div class="elem_wripper">
                    <zakaz-select label="Выберите тип:" :list="zak_type_list" v-model="zak_type" ></zakaz-select>
                </div>

                <div class="elem_wripper" v-show="zak_type == 'Голос'">
                    <zakaz-select  label="Обработка:" :list="zak_obr_type_list" v-model="zak_obr_type" ></zakaz-select>
                </div>
                <p class="information" v-show="zak_type == 'IVR'">Расчет ведется за каждый элемент IVR а не по общему хронометражу</p>
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
            <p>{{ zak_price }}  ₽</p>
        </div>

        <div class="quill_wrapper">
            <label for="">Введите комментарий к заказу</label>
            <quill-editor theme="snow" contentType="html" :toolbar="['bold', 'italic', 'underline']" ></quill-editor>
        </div>

        <label for="file">Прикрепите файл:</label>
        <input type="file" accept="audio/*" id="file">



        <label for="type_calc">Введите ваш email:</label>
        <input v-model="email" type="text" id="email">

        <label for="type_calc">Введите ваш телефон:</label>
        <input v-model="phone" type="text" id="phone">

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

import {  correctHronoText } from '../Hrono.js'
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
        let zak_type = ref("Голос")
        let zak_type_list = ["Голос", "Ролик", "IVR"]

        let zak_obr_type = ref("Без обработки")
        let zak_obr_type_list = ["Без обработки", "Базовые обработки", "Почистить в один дубль"]

        let zak_irv_type = ref("Без музыки")
        let zak_irv_type_list = ["Без музыки", "С музыкой"]

        let select_diktors = ref(["Щербатюк Максим", "Генералова Елена"])

        let result_text = ref('Стандартный:<br/>Игровой:<br/>Медленный: <br/> Страниц текста всего:')

        let zak_price = ref(0)

        let standart_chrono = ref(0)
        let multiselect = ref(true)

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
            zak_price.value = 0
            if (zak_type.value == "Голос") zak_price.value = golosCalc(standart_chrono.value, zak_obr_type.value, select_diktors.value)
            if (zak_type.value == "Ролик") zak_price.value = golosRolik(standart_chrono.value, select_diktors.value)
            if (zak_type.value == "IVR") zak_price.value = golosIVR(standart_chrono.value, zak_irv_type.value, select_diktors.value)
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
                    if (dop == "Без обработки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].system_cost)
                    if (dop == "Базовые обработки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].obr_standatr)
                    if (dop == "Почистить в один дубль") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].obr_one)
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
                    if (dop == "Без музыки") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].ivr_cost)
                    if (dop == "С музыкой") total += parseFloat(diktor.price_table[diktor.price_table.length - 1].ivr_music_cost)
                }


            }

                return total
        }

        const golosRolik = (hrono, diktors) => {
            if (hrono == 0) return 0
            let max_price = 0
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
            result_text.value = result.resultText
            standart_chrono.value = result.standart

        }

        const diktor_text_editor = ref(null)

        const sendOrder = () => {
            axios.post("/create_order", {
                _token: document.querySelector('meta[name="_token"]').content,
                order: {
                    'content':content.value,
                    'zak_type':zak_type.value,
                    'obrabotka':zak_obr_type.value,
                    'irv_muz':zak_irv_type.value,
                    'price':zak_price.value,
                    "email":email.value,
                    "phone":phone.value,
                    'standart_chrono':standart_chrono.value,
                }
            })
            .then((response) => {
                console.log(response)
            })
            .catch( error => console.log(error));

        }

        return {
            content,
            zak_type,
            zak_type_list,
            zak_obr_type,
            result_text,
            zak_obr_type_list,

            zak_irv_type,
            zak_irv_type_list,

            multiselect,

            diktor_text_editor,
            select_diktors,
            zak_price,
            email,
            phone,
            diktorTextChenge,
            sendOrder
        }
    }
}
</script>

<style>

</style>
