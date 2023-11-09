<template>
   <form class="chrono_form" action="">
        <div class="area">
            <textarea @input="calc_chrono" v-model="calc_text" name="text_chrono" placeholder="Спец символы ( № и т.п.) вводите словами.Например, пишите не '№1', а 'Номер 1'. Текст должен быть НЕ обьединенный, несущий единую информацию одной тематики и не предназначенный для монтажа множества роликов. Расчет хронометража, количества страниц и стоимости - ПРИМЕРНЫЙ и может отличаться от реального" id="" cols="30" rows="10"></textarea>
        </div>

        <div class="chrono_form__control_panel">
            <button @click.prevent="calc_text=''">Очистить</button>
        </div>

        <div class="chrono_text">
          <h3>Хронометраж</h3>
          <p v-html="result_text"></p>
          <strong>Цена: </strong>
        </div>

   </form>
</template>

<script>
import { calcPriceHrono, getDictorsByHrono, totalCalcHrono, correctHronoText } from '../Hrono.js'

import { ref } from 'vue'
export default {
    setup() {
        let calc_text = ref('')
        let result_text = ref('Стандартный:<br/>Игровой:<br/>Медленный: <br/> Страниц текста всего:')

        //Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный риторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз.

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
            let result = calcHronoTime(correctHronoText(calc_text.value))
            result_text.value = result.resultText
            console.log(result)
            console.log(calcHronoPrice('standart'))
        }

        return {
            calc_text,
            calc_chrono,
            result_text
        }
    }
}
</script>

<style>

</style>
