<template>
   <form class="chrono_form" action="">
        <div class="area">
            <textarea v-model="calc_text" name="text_chrono" placeholder="Спец символы ( № и т.п.) вводите словами.Например, пишите не '№1', а 'Номер 1'. Текст должен быть НЕ обьединенный, несущий единую информацию одной тематики и не предназначенный для монтажа множества роликов. Расчет хронометража, количества страниц и стоимости - ПРИМЕРНЫЙ и может отличаться от реального" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="chrono_form__control_panel">
            <button @click.prevent="calc_chrono">Рассчет</button>
        </div>
   </form>
</template>

<script>
import { calcPriceHrono, getDictorsByHrono, totalCalcHrono, correctHronoText } from '../Hrono.js'

import { ref } from 'vue'
export default {
    setup() {
        let calc_text = ref('Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу.')

    const calcHronoTime = (txt) => {
        const hrono = totalCalcHrono(txt);
        return {
            standart: hrono.calcStandart,
            game: hrono.calcGame,
            slow: hrono.calcSlow,
            pages: hrono.calcPages,
            resultText: hrono.resultText,
            textStandart: hrono.textStandart,
            textGame: hrono.textGame,
            textSlow: hrono.textSlow,
            textPages: hrono.textPages,
        };
    }

    const calcHronoDictors = (standart, objectActors, actors) => {
        if (hronoTime) {
            return getDictorsByHrono(standart, objectActors, actors);
        }
    }

    const calcHronoPrice = (type) => {
        if (hronoTime && hronoDictors && hronoDictors.dictors) {
            return calcPriceHrono(hronoDictors.dictors.map(dictor => dictor.price[0]), type);
        }
    }


        const calc_chrono = () => {
            let text = calcHronoTime(correctHronoText(calc_text.value))

            console.log(text)
        }

        return {
            calc_text,
            calc_chrono
        }
    }
}
</script>

<style>

</style>
