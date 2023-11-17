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
        </div>

        <select v-model="type" name="type_calc" id="type_calc">
            <option value="Голос">Голос</option>
            <option value="Ролик">Ролик</option>
            <option value="IVR">IVR</option>
        </select>
        <br>
        <select v-show="type == 'Голос'" v-model="type_obr" name="type_obr" id="type_obr">
            <option value="Без обработки">Без обработки</option>
            <option value="Базовые обработки">Базовые обработки</option>
            <option value="Почистить в один дубль">Почистить в один дубль</option>
        </select>

        <div class="dictors">

            <div v-for="(item, index) in dictors" :key="index" class="rolik_line">
                <div class="name"><span>{{item.name}}</span></div>
                <div class="rolik"><audio :src="item.file" controls=""></audio></div>
                <div class="price"><span>{{item.price}} ₽</span></div>
            </div>

        </div>
   </form>
</template>

<script>
import { calcPriceHrono, getDictorsByHrono, totalCalcHrono, correctHronoText } from '../Hrono.js'
import { calcHronoTime, calcHronoDictors, calcHronoPrice } from '../HronoDopCalc.js'
import { useStore } from 'vuex'

import { watch, ref } from 'vue'
export default {
    setup() {
        let calc_text = ref('')
        let result_text = ref('Стандартный:<br/>Игровой:<br/>Медленный: <br/> Страниц текста всего:')
        let type = ref('Голос')
        let type_obr = ref('Без обработки')
        let standart_chrono = ref(0)

        const store = useStore()


        let dictors = ref([]);

        watch(() => [store.getters.dictors, standart_chrono.value, type.value, type_obr.value,], function() {
            console.log("---->")
            getDictorsList()
        });



        //Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Вдали от всех живут они в буквенных домах на берегу Семантика большого языкового океана. Маленький ручеек Даль журчит по всей стране и обеспечивает ее всеми необходимыми правилами. Эта парадигматическая страна, в которой жаренные члены предложения залетают прямо в рот. Даже всемогущая пунктуация не имеет власти над рыбными текстами, ведущими безорфографичный образ жизни. Однажды одна маленькая строчка рыбного текста по имени Lorem ipsum решила выйти в большой мир грамматики. Великий Оксмокс предупреждал ее о злых запятых, диких знаках вопроса и коварных точках с запятой, но текст не дал сбить себя с толку. Он собрал семь своих заглавных букв, подпоясал инициал за пояс и пустился в дорогу. Взобравшись на первую вершину курсивных гор, бросил он последний взгляд назад, на силуэт своего родного города Буквоград, на заголовок деревни Алфавит и на подзаголовок своего переулка Строчка. Грустный риторический вопрос скатился по его щеке и он продолжил свой путь. По дороге встретил текст рукопись. Она предупредила его: «В моей стране все переписывается по несколько раз.

        const calc_chrono = () => {
            let result = calcHronoTime(correctHronoText(calc_text.value))
            result_text.value = result.resultText
            standart_chrono.value = result.standart
        }

        const getDictorsList = () => {
            dictors.value = []
            for (let diktor_index in store.getters.dictors) {
                let diktor = store.getters.dictors[diktor_index]

                if ((type.value == "IVR") && (diktor.irv != 1)) continue;


                let dictor_name = ""
                let dictor_smple = ""
                let dictor_price = ""

                for (let price_interval_index in diktor.price_table) {

                    let price_interval = diktor.price_table[price_interval_index]

                    if ((standart_chrono.value >= price_interval.start) && (standart_chrono.value<=price_interval.finish)) {
                        dictor_name = diktor.name
                        dictor_smple = diktor.file

                        if (type.value == "Голос") {
                            if (type_obr.value == "Без обработки") dictor_price = price_interval.system_cost
                            if (type_obr.value == "Базовые обработки") dictor_price = price_interval.obr_standatr
                            if (type_obr.value == "Почистить в один дубль") dictor_price = price_interval.obr_one
                        }

                        if (type.value == "Ролик") dictor_price = price_interval.sample_cost
                        if (type.value == "IVR") dictor_price = price_interval.ivr_cost

                    }


                }

                if (dictor_name != "") {
                        dictors.value.push({
                            "name":dictor_name,
                            "file":dictor_smple,
                            "price":dictor_price,
                        })
                }
            }
        }

        return {
            calc_text,
            calc_chrono,
            result_text,
            dictors,
            type,
            type_obr
        }
    }
}
</script>

<style>

</style>
