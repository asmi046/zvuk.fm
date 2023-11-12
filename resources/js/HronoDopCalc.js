import { calcPriceHrono, getDictorsByHrono, totalCalcHrono, correctHronoText } from './Hrono.js'

export const calcHronoTime = (txt) => {
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

export const calcHronoDictors = (standart, objectActors, actors) => {
    if (hronoTime) {
        return getDictorsByHrono(standart, objectActors, actors);
    }
}

export const calcHronoPrice = (type) => {
    if (hronoTime && hronoDictors && hronoDictors.dictors) {
        return calcPriceHrono(hronoDictors.dictors.map(dictor => dictor.price[0]), type);
    }
}
