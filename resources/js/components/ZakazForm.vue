<template>
    <form class="zakaz_form" action="">
        <textarea cols="30" rows="10" placeholder="Введите текст ДЛЯ ДИКТОРА. Важно! Текст заказа должен быть введён именно в это поле, а не в прикреплённом к письму текстовом файле"></textarea>
        <div class="quill_wrapper">
            <label for="">Введите комментарий к заказу</label>
            <quill-editor theme="snow" contentType="html" v-model:content="content"></quill-editor>
        </div>

        <label for="file">Прикрепите файл:</label>
        <input type="file" accept="audio/*" id="file">

        <label for="type_calc">Выберите тип:</label>
        <select name="type_calc" id="type_calc">
            <option value="Голос">Голос</option>
            <option value="Ролик">Ролик</option>
            <option value="IRV">IRV</option>
        </select>

        <label for="type_obr">Обработка:</label>
        <select name="type_obr" id="type_obr">
            <option value="Без обработки">Без обработки</option>
            <option value="Базовая обработка">Базовая обработка</option>
            <option value="Почистить в один дубль">Почистить в один дубль</option>
        </select>

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

export default {
    components:{
        QuillEditor
    },

    setup() {

        let content = ref("d1fsdfsdf");

        return {
            content
        }
    }
}
</script>

<style>

</style>
