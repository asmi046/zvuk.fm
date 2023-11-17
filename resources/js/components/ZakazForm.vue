<template>
    <form class="zakaz_form" action="">
        <zakaz-dictors></zakaz-dictors>
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
            </div>

            <div class="col">
                <div class="chrono_text">
                    <h3>Хронометраж</h3>
                    <p v-html="result_text"></p>
                </div>
            </div>
        </div>


        <div class="quill_wrapper">
            <label for="">Введите комментарий к заказу</label>
            <quill-editor theme="snow" contentType="html" :toolbar="['bold', 'italic', 'underline']" ></quill-editor>
        </div>

        <label for="file">Прикрепите файл:</label>
        <input type="file" accept="audio/*" id="file">



        <label for="type_calc">Введите ваш email:</label>
        <input type="text" id="email">

        <label for="type_calc">Введите ваш телефон:</label>
        <input type="text" id="phone">

        <div class="chrono_form__control_panel">
            <button>Отправить</button>
        </div>
    </form>
</template>

<script>
import { ref } from 'vue';

import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import ZakazSelect from './ZakazSelect.vue';
import ZakazDictors from './ZakazDictors.vue';

import {  correctHronoText } from '../Hrono.js'
import { calcHronoTime } from '../HronoDopCalc.js'

export default {
    components:{
    QuillEditor,
    ZakazSelect,ZakazDictors
},

    setup() {

        let content = ref("");
        let zak_type = ref("Голос")
        let zak_type_list = ["Голос", "Ролик", "IRV"]
        let zak_obr_type = ref("Без обработки")
        let zak_obr_type_list = ["Без обработки", "Базовая обработка", "Почистить в один дубль"]
        let result_text = ref('Стандартный:<br/>Игровой:<br/>Медленный: <br/> Страниц текста всего:')

        let standart_chrono = ref(0)

        const diktorTextChenge = () => {
            let clear_text = diktor_text_editor.value.getText().trim()
            let result = calcHronoTime(correctHronoText(clear_text))
            result_text.value = result.resultText
            standart_chrono.value = result.standart
        }

        const diktor_text_editor = ref(null)

        return {
            content,
            zak_type,
            zak_type_list,
            zak_obr_type,
            result_text,
            zak_obr_type_list,
            diktor_text_editor,
            diktorTextChenge
        }
    }
}
</script>

<style>

</style>
