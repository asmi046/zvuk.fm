import $ from "jquery";
//   var dictors = [
//     ['Андросов', 1, 1, 1, 1, 1, 1],
//     ['Баранов', 1, 1, 1, 1, 1, 1],
//     ['Генералова', 1, 1, 1, 1, 1, 1],
//     ['Ковалева', 1, 1, 1, 1, 1, 1],
//     ['Никитенко', 1, 1, 1, 1, 1, 1],
//     ['Ольховский', 1, 1, 1, 1, 1, 1],
//     ['Харитонов', 1, 1, 1, 1, 1, 1],
//     ['Ромашкин', 1, 1, 1, 1, 1, 1],
//     ['Илья', 1, 1, 1, 1, 1, 1],
//     ['Щербатюк', 1, 1, 1, 1, 1, 1],
//     ['Софья', 1, 1, 1, 1, 1, 1]
// ];

// var priceList = [300, 400, 600, 800, 900, 1e3];

var spetsSymbols = ['.', ',', ':', '_', '№', ';', '!', '?', '-', '@', ' ', '#9', '#10', '#13'];
var digitSimbols = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
var percentSymbol = ['%'];
var commaDotSymbols = [',', '.'];
var dogSymbol = ['@'];

var twoSpace = '  ';
var placeholderMsg = ' Спец символы ( № и т.п.) вводите словами.Например, пишите не "№1", а "Номер 1". Текст должен быть НЕ обьединенный, несущий единую информацию одной тематики и не предназначенный для монтажа множества роликов. Расчет хронометража, количества страниц и стоимости - ПРИМЕРНЫЙ и может отличаться от реального. ';
var errorMsgEmptyInputText = 'Текст не был введен! Пожалуйста, введите текст и повторите подсчет.';
var errorMsgMaxCountPages = 'Количество страниц текста превышает максимально допустимое! Пожалуйста, уменьшите количество слов в тексте.';
var errorMsgBigNumber = 'В тексте присутствует слишком большое числительное!';
var maxCountPages = 10.1;

var enRusLetters = [];
for (var idx = 65; idx < 90; idx++) {
    enRusLetters.push(String.fromCharCode(idx));
    enRusLetters.push(String.fromCharCode(idx + 32));
};
for (idx = 1040; idx < 1103; idx++) {
    enRusLetters.push(String.fromCharCode(idx));
};

var _0x9571x15 = {
    CurrencyList: {
        language: {
            "-value": 'RUS'
        },
        RUS: {
            item: [{
                "-value": '0',
                "-text": 'ноль'
            }, {
                "-value": '1000_10',
                "-text": 'тысяч,миллионов,миллиардов,триллионов'
            }, {
                "-value": '1000_1',
                "-text": 'тысяча,миллион,миллиард,триллион'
            }, {
                "-value": '1000_234',
                "-text": 'тысячи,миллиона,миллиарда,триллиона'
            }, {
                "-value": '1000_5',
                "-text": 'тысяч,миллионов,миллиардов,триллионов'
            }, {
                "-value": '10_19',
                "-text": 'десять,одиннадцать,двенадцать,тринадцать,четырнадцать,пятнадцать,шестнадцать,семнадцать,восемнадцать,девятнадцать'
            }, {
                "-value": '1',
                "-text": 'одна,один,один,одна'
            }, {
                "-value": '2',
                "-text": 'две,два,два,две'
            }, {
                "-value": '3_9',
                "-text": 'три,четыре,пять,шесть,семь,восемь,девять'
            }, {
                "-value": '100_900',
                "-text": 'сто ,двести ,триста ,четыреста ,пятьсот ,шестьсот ,семьсот ,восемьсот ,девятьсот '
            }, {
                "-value": '20_90',
                "-text": 'двадцать ,тридцать ,сорок ,пятьдесят ,шестьдесят ,семьдесят ,восемьдесят ,девяносто '
            }]
        },
        RUR: [{
            "-CurrID": '810',
            "-CurrName": 'Российские рубли',
            "-language": 'RUS',
            "-RubOneUnit": '',
            "-RubTwoUnit": '',
            "-RubFiveUnit": '',
            "-RubSex": 'M',
            "-KopOneUnit": '',
            "-KopTwoUnit": '',
            "-KopFiveUnit": '',
            "-KopSex": 'F'
        }],
        PER10: [{
            "-CurrID": '556',
            "-CurrName": 'Вiдсотки з десятими частинами',
            "-language": 'RUS',
            "-RubOneUnit": 'целая',
            "-RubTwoUnit": 'целых',
            "-RubFiveUnit": 'целых',
            "-RubSex": 'F',
            "-KopOneUnit": 'десятая',
            "-KopTwoUnit": 'десятых',
            "-KopFiveUnit": 'десятых',
            "-KopSex": 'F'
        }],
        PER100: [{
            "-CurrID": '557',
            "-CurrName": 'Вiдсотки з сотими частинами',
            "-language": 'RUS',
            "-RubOneUnit": 'целая',
            "-RubTwoUnit": 'целых',
            "-RubFiveUnit": 'целых',
            "-RubSex": 'F',
            "-KopOneUnit": 'сотая',
            "-KopTwoUnit": 'сотых',
            "-KopFiveUnit": 'сотых',
            "-KopSex": 'F'
        }],
        PER1000: [{
            "-CurrID": '558',
            "-CurrName": 'Вiдсотки з тисячними частинами',
            "-language": 'RUS',
            "-RubOneUnit": 'целая',
            "-RubTwoUnit": 'целых',
            "-RubFiveUnit": 'целых',
            "-RubSex": 'F',
            "-KopOneUnit": 'тысячная',
            "-KopTwoUnit": 'тысячных',
            "-KopFiveUnit": 'тысячных',
            "-KopSex": 'F'
        }],
        PER10000: [{
            "-CurrID": '559',
            "-CurrName": 'Вiдсотки з десяти тисячними частинами',
            "-language": 'RUS',
            "-RubOneUnit": 'целая',
            "-RubTwoUnit": 'целых',
            "-RubFiveUnit": 'целых',
            "-RubSex": 'F',
            "-KopOneUnit": 'десятитысячная',
            "-KopTwoUnit": 'десятитысячные',
            "-KopFiveUnit": 'десятитысячных',
            "-KopSex": 'F'
        }]
    }
},
_0x9571x16 = function () {
    function _0x9571x1() {}
    return _0x9571x1.UAH = 'UAH', _0x9571x1.RUR = 'RUR', _0x9571x1.USD = 'USD', _0x9571x1.PER10 = 'PER10', _0x9571x1.PER100 = 'PER100', _0x9571x1.PER1000 = 'PER1000', _0x9571x1.PER10000 = 'PER10000', _0x9571x1
}(),
_0x9571x17 = function () {
    function _0x9571x1() {}
    return _0x9571x1.RUS = 'RUS', _0x9571x1.UKR = 'UKR', _0x9571x1.ENG = 'ENG', _0x9571x1
}(),
_0x9571x18 = function () {
    function _0x9571x1() {}
    return _0x9571x1.NUMBER = 'NUMBER', _0x9571x1.TEXT = 'TEXT', _0x9571x1
}(),
_0x9571x19 = function () {
    function _0x9571x1() {
        this._buffer = []
    }
    return _0x9571x1.prototype.append = function (_0x9571x1) {
        return this._buffer[this._buffer.length] = _0x9571x1, this
    }, _0x9571x1.prototype.insert = function (_0x9571x1, _0x9571x2) {
        return this._buffer.splice(_0x9571x1, 0, _0x9571x2), this
    }, _0x9571x1.prototype.length = function () {
        return this.toString().length
    }, _0x9571x1.prototype.deleteCharAt = function (_0x9571x1) {
        var _0x9571x2 = this.toString();
        return this._buffer = [], this.append(_0x9571x2.substring(0, _0x9571x1)), this
    }, _0x9571x1.prototype.toString = function () {
        return this._buffer.join('')
    }, _0x9571x1
}(),
_0x9571x1a = function () {
    function _0x9571x1(_0x9571x1, _0x9571x2, _0x9571x3) {
        this.currency = _0x9571x1, this.language = _0x9571x2, this.pennies = _0x9571x3;
        var _0x9571x4 = _0x9571x2,
            _0x9571x5 = _0x9571x15.CurrencyList[_0x9571x4].item;
        this.messages = {};
        for (var _0x9571x6 in _0x9571x5) {
            var _0x9571x7 = _0x9571x5[_0x9571x6];
            _0x9571x7['-text'] && (this.messages[_0x9571x7['-value']] = _0x9571x7['-text'].split(','))
        };
        var _0x9571x8 = _0x9571x15.CurrencyList[_0x9571x1],
            _0x9571x9 = null;
        for (var _0x9571x6 in _0x9571x8) {
            if (_0x9571x8[_0x9571x6]['-language'] == _0x9571x2) {
                _0x9571x9 = _0x9571x8[_0x9571x6];
                break
            }
        };
        if (null == _0x9571x9) {
            throw new Error('Currency not found ' + _0x9571x1)
        };
        this.rubOneUnit = _0x9571x9['-RubOneUnit'], this.rubTwoUnit = _0x9571x9['-RubTwoUnit'], this.rubFiveUnit = _0x9571x9['-RubFiveUnit'], this.kopOneUnit = _0x9571x9['-KopOneUnit'], this.kopTwoUnit = _0x9571x9['-KopTwoUnit'], this.kopFiveUnit = _0x9571x9['-KopFiveUnit'], this.rubSex = _0x9571x9['-RubSex'], this.kopSex = _0x9571x9['-KopSex']
    }
    return _0x9571x1.NUM0 = 0, _0x9571x1.NUM1 = 1, _0x9571x1.NUM2 = 2, _0x9571x1.NUM3 = 3, _0x9571x1.NUM4 = 4, _0x9571x1.NUM5 = 5, _0x9571x1.NUM6 = 6, _0x9571x1.NUM7 = 7, _0x9571x1.NUM8 = 8, _0x9571x1.NUM9 = 9, _0x9571x1.NUM10 = 10, _0x9571x1.NUM11 = 11, _0x9571x1.NUM12 = 12, _0x9571x1.NUM100 = 100, _0x9571x1.NUM1000 = 1e3, _0x9571x1.NUM10000 = 1e4, _0x9571x1.INDEX_0 = 0, _0x9571x1.INDEX_1 = 1, _0x9571x1.INDEX_2 = 2, _0x9571x1.INDEX_3 = 3, _0x9571x1.percentToStr = function (_0x9571x2, _0x9571x3) {
        if (null == _0x9571x2) {
            throw new Error('amount is null')
        };
        if (null == _0x9571x3) {
            throw new Error('Language is null')
        };
        var _0x9571x6, _0x9571x4 = parseInt(_0x9571x2),
            _0x9571x5 = 0;
        return _0x9571x2 == _0x9571x2.toInt() ? _0x9571x6 = new _0x9571x1(_0x9571x16.PER10, _0x9571x3, _0x9571x18.TEXT).convert(_0x9571x2, 0) : (_0x9571x2 * _0x9571x1.NUM10).toFixed(4) == parseInt('' + _0x9571x2 * _0x9571x1.NUM10).toFixed(4) ? (_0x9571x5 = Math.round((_0x9571x2 - _0x9571x4) * _0x9571x1.NUM10), _0x9571x6 = new _0x9571x1(_0x9571x16.PER10, _0x9571x3, _0x9571x18.TEXT).convert(_0x9571x4, _0x9571x5)) : (_0x9571x2 * _0x9571x1.NUM100).toFixed(4) == parseInt('' + _0x9571x2 * _0x9571x1.NUM100).toFixed(4) ? (_0x9571x5 = Math.round((_0x9571x2 - _0x9571x4) * _0x9571x1.NUM100), _0x9571x6 = new _0x9571x1(_0x9571x16.PER100, _0x9571x3, _0x9571x18.TEXT).convert(_0x9571x4, _0x9571x5)) : (_0x9571x2 * _0x9571x1.NUM1000).toFixed(4) == parseInt('' + _0x9571x2 * _0x9571x1.NUM1000).toFixed(4) ? (_0x9571x5 = Math.round((_0x9571x2 - _0x9571x4) * _0x9571x1.NUM1000), _0x9571x6 = new _0x9571x1(_0x9571x16.PER1000, _0x9571x3, _0x9571x18.TEXT).convert(_0x9571x4, _0x9571x5)) : (_0x9571x5 = Math.round((_0x9571x2 - _0x9571x4) * _0x9571x1.NUM10000), _0x9571x6 = new _0x9571x1(_0x9571x16.PER10000, _0x9571x3, _0x9571x18.TEXT).convert(_0x9571x4, _0x9571x5)), _0x9571x6
    }, _0x9571x1.prototype.convertValue = function (_0x9571x2) {
        if (void(0) === typeof _0x9571x2 || null == _0x9571x2) {
            throw new Error('theMoney is null')
        };
        var _0x9571x3 = parseInt(_0x9571x2),
            _0x9571x4 = Math.round((_0x9571x2 - _0x9571x3) * _0x9571x1.NUM100);
        return this.currency == _0x9571x16.PER1000 && (_0x9571x4 = Math.round((_0x9571x2 - _0x9571x3) * _0x9571x1.NUM1000)), this.convert(_0x9571x3, _0x9571x4)
    }, _0x9571x1.prototype.convert = function (_0x9571x2, _0x9571x3) {
        if (void(0) === typeof _0x9571x2 || null == _0x9571x2) {
            throw new Error('theMoney is null')
        };
        if (void(0) === typeof _0x9571x3 || null == _0x9571x3) {
            throw new Error('theKopeiki is null')
        };
        var _0x9571x4 = new _0x9571x19,
            _0x9571x5 = 0,
            _0x9571x6 = 0,
            _0x9571x7 = _0x9571x2;
        0 == _0x9571x7 && _0x9571x4.append(this.messages['0'][0] + ' ');
        do {
            if (_0x9571x6 = parseInt('' + _0x9571x7 % _0x9571x1.NUM1000), _0x9571x4.insert(0, this.triad2Word(_0x9571x6, _0x9571x5, this.rubSex)), 0 == _0x9571x5) {
                var _0x9571x8 = parseInt('' + _0x9571x6 % _0x9571x1.NUM100 / _0x9571x1.NUM10),
                    _0x9571x9 = parseInt('' + _0x9571x6 % _0x9571x1.NUM10);
                if (_0x9571x8 == _0x9571x1.NUM1) {
                    _0x9571x4.append(this.rubFiveUnit)
                } else {
                    switch (_0x9571x9) {
                    case _0x9571x1.NUM1:
                        _0x9571x4.append(this.rubOneUnit);
                        break;
                    case _0x9571x1.NUM2:
                        ;
                    case _0x9571x1.NUM3:
                        ;
                    case _0x9571x1.NUM4:
                        _0x9571x4.append(this.rubTwoUnit);
                        break;
                    default:
                        _0x9571x4.append(this.rubFiveUnit)
                    }
                }
            };
            _0x9571x7 = parseInt('' + _0x9571x7 / _0x9571x1.NUM1000), _0x9571x5++
        } while (_0x9571x7 > 0);;
        if (this.pennies == _0x9571x18.TEXT ? _0x9571x4.append(this.language == _0x9571x17.ENG ? ' and ' : ' ').append(0 == _0x9571x3 ? '' : this.triad2Word(_0x9571x3, 0, this.kopSex)) : _0x9571x4.append(' ' + (10 > _0x9571x3 ? '0' + _0x9571x3 : _0x9571x3) + ' '), _0x9571x3 == _0x9571x1.NUM11 || _0x9571x3 == _0x9571x1.NUM12) {
            _0x9571x4.append(this.kopFiveUnit)
        } else {
            switch (parseInt('' + _0x9571x3 % _0x9571x1.NUM10)) {
            case _0x9571x1.NUM1:
                _0x9571x4.append(this.kopOneUnit);
                break;
            case _0x9571x1.NUM2:
                ;
            case _0x9571x1.NUM3:
                ;
            case _0x9571x1.NUM4:
                _0x9571x4.append(this.kopTwoUnit);
                break;
            default:
                _0x9571x4.append(this.kopFiveUnit)
            }
        };
        return _0x9571x4.toString().trim()
    }, _0x9571x1.prototype.triad2Word = function (_0x9571x2, _0x9571x3, _0x9571x4) {
        var _0x9571x5 = new _0x9571x19;
        if (0 == _0x9571x2) {
            return ''
        };
        var _0x9571x6 = this.check1(_0x9571x2, _0x9571x5);
        this.language == _0x9571x17.ENG && _0x9571x5.length() > 0 && 0 == _0x9571x2 % _0x9571x1.NUM10 && (_0x9571x5.deleteCharAt(_0x9571x5.length() - 1), _0x9571x5.append(' '));
        var _0x9571x7 = _0x9571x6;
        switch (_0x9571x6 = parseInt('' + _0x9571x2 % _0x9571x1.NUM10), this.check2(_0x9571x3, _0x9571x4, _0x9571x5, _0x9571x2, _0x9571x7), _0x9571x3) {
        case _0x9571x1.NUM0:
            break;
        case _0x9571x1.NUM1:
            ;
        case _0x9571x1.NUM2:
            ;
        case _0x9571x1.NUM3:
            ;
        case _0x9571x1.NUM4:
            if (_0x9571x7 == _0x9571x1.NUM1) {
                _0x9571x5.append(this.messages['1000_10'][_0x9571x3 - 1] + ' ')
            } else {
                switch (_0x9571x6) {
                case _0x9571x1.NUM1:
                    _0x9571x5.append(this.messages['1000_1'][_0x9571x3 - 1] + ' ');
                    break;
                case _0x9571x1.NUM2:
                    ;
                case _0x9571x1.NUM3:
                    ;
                case _0x9571x1.NUM4:
                    _0x9571x5.append(this.messages['1000_234'][_0x9571x3 - 1] + ' ');
                    break;
                default:
                    _0x9571x5.append(this.messages['1000_5'][_0x9571x3 - 1] + ' ')
                }
            };
            break;
        default:
            _0x9571x5.append('??? ')
        };
        return _0x9571x5.toString()
    }, _0x9571x1.prototype.check2 = function (_0x9571x2, _0x9571x3, _0x9571x4, _0x9571x5, _0x9571x6) {
        var _0x9571x7 = parseInt('' + _0x9571x5 % _0x9571x1.NUM10);
        if (1 == _0x9571x6) {
            _0x9571x4.append(this.messages['10_19'][_0x9571x7] + ' ')
        } else {
            switch (_0x9571x7) {
            case _0x9571x1.NUM1:
                _0x9571x2 == _0x9571x1.NUM1 ? _0x9571x4.append(this.messages['1'][_0x9571x1.INDEX_0] + ' ') : _0x9571x2 == _0x9571x1.NUM2 || _0x9571x2 == _0x9571x1.NUM3 || _0x9571x2 == _0x9571x1.NUM4 ? _0x9571x4.append(this.messages['1'][_0x9571x1.INDEX_1] + ' ') : 'M' == _0x9571x3 ? _0x9571x4.append(this.messages['1'][_0x9571x1.INDEX_2] + ' ') : 'F' == _0x9571x3 && _0x9571x4.append(this.messages['1'][_0x9571x1.INDEX_3] + ' ');
                break;
            case _0x9571x1.NUM2:
                _0x9571x2 == _0x9571x1.NUM1 ? _0x9571x4.append(this.messages['2'][_0x9571x1.INDEX_0] + ' ') : _0x9571x2 == _0x9571x1.NUM2 || _0x9571x2 == _0x9571x1.NUM3 || _0x9571x2 == _0x9571x1.NUM4 ? _0x9571x4.append(this.messages['2'][_0x9571x1.INDEX_1] + ' ') : 'M' == _0x9571x3 ? _0x9571x4.append(this.messages['2'][_0x9571x1.INDEX_2] + ' ') : 'F' == _0x9571x3 && _0x9571x4.append(this.messages['2'][_0x9571x1.INDEX_3] + ' ');
                break;
            case _0x9571x1.NUM3:
                ;
            case _0x9571x1.NUM4:
                ;
            case _0x9571x1.NUM5:
                ;
            case _0x9571x1.NUM6:
                ;
            case _0x9571x1.NUM7:
                ;
            case _0x9571x1.NUM8:
                ;
            case _0x9571x1.NUM9:
                _0x9571x4.append(['', '', ''].concat(this.messages['3_9'])[_0x9571x7] + ' ')
            }
        }
    }, _0x9571x1.prototype.check1 = function (_0x9571x2, _0x9571x3) {
        var _0x9571x4 = parseInt('' + _0x9571x2 / _0x9571x1.NUM100);
        return _0x9571x3.append([''].concat(this.messages['100_900'])[_0x9571x4]), _0x9571x4 = parseInt('' + _0x9571x2 % _0x9571x1.NUM100 / _0x9571x1.NUM10), _0x9571x3.append(['', ''].concat(this.messages['20_90'])[_0x9571x4]), _0x9571x4
    }, _0x9571x1
}(),
_0x9571x1b = function (val) {
    var len = val.length;
    var res = 0;
    for (var idx = 1; idx <= len; idx++) {
        if(idx == len || $.inArray(val[idx + 1], spetsSymbols) != -1) {
            res++;
        }
    };
    return res
},
getCountReadDigit = function (number) {
    var _0x9571x2 = number;
    var _0x9571x3 = '';
    var _0x9571x4 = 'RUR';
    var _0x9571x5 = new Array;
    _0x9571x5[1] = 'PER10';
    _0x9571x5[2] = 'PER100';
    _0x9571x5[3] = 'PER1000';
    _0x9571x5[4] = 'PER10000';
    for (var s = 0; s <= number.length; s++) {
        if(number[s] == '.' || number[s] == ',') {
            _0x9571x2 = number.substring(0, s);
            _0x9571x3 = number.substring(s + 1);
            _0x9571x4 = _0x9571x3.length;
            _0x9571x4 = _0x9571x5[_0x9571x4];
        }
    };
    var _0x9571x6 = new _0x9571x1a(_0x9571x4, 'RUS', 'TEXT').convert(_0x9571x2, _0x9571x3);
    return _0x9571x1b(_0x9571x6)
};

function floorRound(val, precision) {
    var pr = Math.pow(10, precision);
    return Math.floor(val * pr) / pr
};

/**
 * Выводит время в удобном для чтения виде
 * @param {int} hronoTime время в секундах
 * @returns string
 */
//hronoTime в секундах
export function formatResult(hronoTime) {
    var result = '',
        //Часов в hronoTime
        hronoHour = Math.floor(hronoTime / 3600),
        _0x9571x4 = Math.floor((hronoTime - 3600 * hronoHour) / 60),
        _0x9571x5 = hronoTime - 3600 * hronoHour - 60 * _0x9571x4,
        seccondTextList = ['cекунда', 'секунды', 'секунд'],
        minTextList = ['минута', 'минуты', 'минут'],
        hourTextList = ['час', 'часа', 'часов'],
        secondText2 = seccondTextList[2],
        minText2 = minTextList[2],
        hourText2 = hourTextList[2];
        secondText2 = (1 == Math.round(_0x9571x5 / 10) && _0x9571x5 > 9) ? seccondTextList[2] :
            (1 == _0x9571x5 % 10) ? seccondTextList[0] :
            (2 == _0x9571x5 % 10 || 3 == _0x9571x5 % 10 || 4 == _0x9571x5 % 10) ? seccondTextList[1] : seccondTextList[2];
        minText2 = (1 == Math.round(_0x9571x4 / 10) && _0x9571x4 > 9) ? minTextList[2] :
            (1 == _0x9571x4 % 10) ? minTextList[0] :
            (2 == _0x9571x4 % 10 || 3 == _0x9571x4 % 10 || 4 == _0x9571x4 % 10) ? minTextList[1] : minTextList[2];
        hourText2 = (1 == Math.round(hronoHour / 10) && hronoHour > 9) ? hourTextList[2] :
            (1 == _0x9571x4 % 10) ? hourTextList[0] :
            (2 == hronoHour % 10 || 3 == hronoHour % 10 || 4 == hronoHour % 10) ? hourTextList[1] : hourTextList[2];
        (hronoTime >= 3600) ? result = hronoHour + ' ' + hourText2 + ', ' + _0x9571x4 + ' ' + minText2 + ', ' + _0x9571x5 + ' ' + secondText2 :
            (3600 > hronoTime && hronoTime > 59) ? result = _0x9571x4 + ' ' + minText2 + ', ' + _0x9571x5 + ' ' + secondText2 :
            (60 > hronoTime && (result = _0x9571x5 + ' ' + secondText2));
    return result
};

String.prototype.splice = function (_0x9571x1, _0x9571x2, _0x9571x3) {
    return this.slice(0, _0x9571x1) + _0x9571x3 + this.slice(_0x9571x1 + _0x9571x2)
};

export const correctHronoText = (txt1) => {
    if (txt1 == '') {
        return txt1;
    }

    var len = txt1.length;
    if(txt1[0] != ' ') {
        txt1 = txt1.splice(0, 0, ' ')
    }

    for (let idx = len; idx >= 2; idx--) {
        -1 != $.inArray(txt1[idx], digitSimbols) && -1 != $.inArray(txt1[idx - 1], enRusLetters) && (txt1 = txt1.splice(idx, 0, ' ')), -1 != $.inArray(txt1[idx], enRusLetters) && -1 != $.inArray(txt1[idx - 1], digitSimbols) && (txt1 = txt1.splice(idx, 0, ' ')), -1 != $.inArray(txt1[idx - 1], commaDotSymbols) && -1 != $.inArray(txt1[idx - 2], enRusLetters) && -1 != $.inArray(txt1[idx], digitSimbols) && (txt1 = txt1.splice(idx, 0, ' ')), -1 != $.inArray(txt1[idx], percentSymbol) && -1 != $.inArray(txt1[idx - 1], digitSimbols) && (txt1 = txt1.splice(idx, 0, ' ')), '8' == txt1[idx - 1] && '9' == txt1[idx] && -1 != $.inArray(txt1[idx + 1], digitSimbols) && -1 != $.inArray(txt1[idx + 2], digitSimbols) && -1 != $.inArray(txt1[idx + 3], digitSimbols) && -1 != $.inArray(txt1[idx + 4], digitSimbols) && (txt1 = txt1.splice(idx, 0, '-'), txt1 = txt1.splice(idx + 4, 0, '-'), txt1 = txt1.splice(idx + 8, 0, '-'), txt1 = txt1.splice(idx + 11, 0, '-')), '+' == txt1[idx - 2] && '7' == txt1[idx - 1] && '9' == txt1[idx] && -1 != $.inArray(txt1[idx + 1], digitSimbols) && -1 != $.inArray(txt1[idx + 2], digitSimbols) && -1 != $.inArray(txt1[idx + 3], digitSimbols) && -1 != $.inArray(txt1[idx + 4], digitSimbols) && (txt1 = txt1.splice(idx, 0, '-'), txt1 = txt1.splice(idx + 4, 0, '-'), txt1 = txt1.splice(idx + 8, 0, '-'), txt1 = txt1.splice(idx + 11, 0, '-')), -1 != $.inArray(txt1[idx], commaDotSymbols) && -1 != $.inArray(txt1[idx - 2], digitSimbols) && -1 != $.inArray(txt1[idx - 1], digitSimbols) && -1 != $.inArray(txt1[idx + 1], digitSimbols) && -1 != $.inArray(txt1[idx + 2], digitSimbols) && -1 != $.inArray(txt1[idx + 3], commaDotSymbols) && -1 != $.inArray(txt1[idx + 4], digitSimbols) && (txt1 = txt1.splice(idx, 0, '-'), txt1 = txt1.splice(idx + 5, 0, '-'), txt1 = txt1.splice(idx + 1, 1, ''), txt1 = txt1.splice(idx + 3, 1, ''))
    };

    return txt1

};

export const getDictorsByHrono = (calcStandart, orderActors, dictors) => {
    let result = {
        dictors: [],
        error: "",
    };

    if(!orderActors) {
        result.error = "Нет дикторов в заказе";
        return result;
    }
    if(!dictors) {
        result.error = "Нет цен дикторов";
        return result;
    }
    if(!calcStandart) {
        result.error = "Не указан хронометраж";
        return result;
    }

    for(let i = 0; i < orderActors.length; i++) {
        for(let j = 0; j < dictors.length; j++) {
            if(dictors[j].id == orderActors[i].id) {
                result.dictors.push({...dictors[j]});
                break;
            }
        }
    }

    result.dictors = result.dictors.map((dictor) => {
        if(!dictor || !dictor.price) {
            return dictor
        }

        for(let i = 0; i < dictor.price.length; i++) {
            let price = dictor.price[i];
            if(price.start <= calcStandart && price.end >= calcStandart)
            {
                dictor.price = [price];
                return dictor;
            }
        }
        return false;
    })

    result.dictors = result.dictors.filter((dictor) => {
        return dictor&&dictor.price&&dictor.price.length;
    })

    if(result.dictors.length != orderActors.length) {
        result.error = "Не заданы цены дикторов для полученного хронометража";
        return result;
    }

    return result;
}
export const calcPriceHrono = (dictors, typeOrder) => {
    //Расчет цены
    //'Стоимость (стандартный): ' + price + ' рублей' + '<br/>';

    // Находим диктора с максимальной ценой для хронометража 50 сек.
    // Исходя из этого, стоимость заказа складывается из (цена ролика)+(сумма цен доп. дикторов)
    // ???Возможно цену умножить на calcPages

    if(!dictors || !dictors.length) {
        return 0;
    }

    let price = 0;
    let maxPriceDictor = -999999;
    let maxDictor = undefined;

    //Поиск диктора с максимальной ценой
    for(let i = 0; i < dictors.length; i++) {
        let actorPrice = +dictors[i].actor_price
        if(actorPrice > maxPriceDictor) {
            maxPriceDictor = actorPrice;
            maxDictor = dictors[i];
        }
    }

    if(!maxDictor) {
        return 0;
    }

    switch (typeOrder) {
        case "Ролик":
            price += +maxDictor.clip_price;
            break;
        case "Голос":
            price += +maxDictor.system_price;
            break;
        case "IVR":
            price += +maxDictor.ivr_price;
            break;
        default:
            break;
    }

    //Подсчет цены заказа
    for(let i = 0; i < dictors.length; i++) {
        if(dictors[i].id === maxDictor.id) {
            continue
        }

        price += +dictors[i].sub_actor_price;

    }

    price = 100 * Math.ceil(price / 100);
    return price;
};
export const totalCalcHrono = (txt1) => {
    var result = {};
    var totalWordsCount = 0;
    var number = '';
    // var txt1 = $('#txt1').val();
    // var hrono = $('#h_value').val();
    var txt1Length = txt1.length,
        isNumber = true,
        wordLen = 0,
        countDogSymbol = 0,
        //Количество произносимых слов в числах
        countReadDigit = 0,
        countReadCommaDot = 0,
        shortWords = 0,
        middleWords = 0,
        longWords = 0,
        _0x9571x12 = 0;
    for (idx = 0; idx < txt1Length; idx++) {
        //не спец символ или .5
        if ($.inArray(txt1[idx], spetsSymbols) == -1 ||
            ($.inArray(txt1[idx + 1], digitSimbols) != -1 && $.inArray(txt1[idx], commaDotSymbols) != -1)) {

            wordLen++;

            if($.inArray(txt1[idx], digitSimbols) == -1 && isNumber) {
              isNumber = false;
            }

            if($.inArray(txt1[idx], '%') != -1 &&
                txt1[idx - 1] == ' ' &&
                $.inArray(txt1[idx - 2], digitSimbols) != -1) {
                middleWords++;
                shortWords--;
            }

            //.4 ,4  4
            if($.inArray(txt1[idx + 1], digitSimbols) != -1 &&
                $.inArray(txt1[idx], commaDotSymbols) != -1 ||
                $.inArray(txt1[idx], digitSimbols) != -1) {
                isNumber = true;
            }

            //3,1  3.1
            if($.inArray(txt1[idx], digitSimbols) != -1 &&
                $.inArray(txt1[idx - 1], commaDotSymbols) != -1 &&
                $.inArray(txt1[idx - 2], digitSimbols) != -1) {
                countReadCommaDot++;
            }

            //a@b
            if($.inArray(txt1[idx], enRusLetters) != -1 &&
                $.inArray(txt1[idx - 1], dogSymbol) != -1 &&
                $.inArray(txt1[idx - 2], enRusLetters) != -1) {
                countDogSymbol++;
            }

            //Если достигли границы слова или конца текста
            if (idx == (txt1Length - 1) ||
                $.inArray(txt1[idx + 1], spetsSymbols) != -1 &&
                ($.inArray(txt1[idx + 2], digitSimbols) == -1 || $.inArray(txt1[idx + 1], commaDotSymbols) == -1)) {
                    if (isNumber) {
                        number = txt1.substr(idx - wordLen + 1, wordLen);
                        if (number.length > 10) {
                            // console.log(errorMsgBigNumber)
                            result.error = true;
                            result.message = errorMsgBigNumber;
                            return result
                            // return $('#txt2').html(errorMsgBigNumber), true
                        };
                        countReadDigit += getCountReadDigit(number)
                    } else {
                        if(wordLen <= 3) {
                            shortWords++;
                        }
                        if(wordLen > 3 && wordLen < 12) {
                            middleWords++;
                        }
                        if(wordLen >= 12) {
                            longWords++;
                        }
                    };
                    wordLen = 0;
                    isNumber = true;
                    totalWordsCount++;
            }
        } else {
            _0x9571x12++;
            isNumber = false;
            wordLen = 0;
        }
    };
    var calcStandart = Math.round(countDogSymbol + 100 * middleWords / 205 + (shortWords - 1) / 4 + longWords + 100 * countReadDigit / 205),
        calcGame = Math.round(countDogSymbol + 100 * middleWords / 180 + (shortWords - 1) / 4 + longWords + 100 * countReadDigit / 180),
        calcSlow = Math.round(countDogSymbol + 100 * middleWords / 135 + (shortWords - 1) / 4 + longWords + 100 * countReadDigit / 135),
        calcPages = (middleWords / 1.9 + (shortWords - 1) / 4 + longWords + countDogSymbol + countReadCommaDot + countReadDigit / 2) / 194;
    if (calcPages = floorRound(calcPages, 2), calcPages > maxCountPages) {
        // $('#txt2').html(errorMsgMaxCountPages)
        result.error = true;
        result.message = errorMsgMaxCountPages;
        return result
    } else {
        // if(_0x9571x1e == 0) {
        //     $('#h_value').val(calcStandart);
        //     hrono = $('#h_value').val();
        // }
        //Этот блок замена блоку выше if(_0x9571x1e == 0)
        // if(!hrono) {
        //     hrono = calcStandart;
        // }
        // var soundTime = 100 * floorRound(hrono / calcStandart, 2);
        var resultText = 'Стандартный: ' + formatResult(calcStandart) + ',<br/>';
            resultText += 'Игровой: ' + formatResult(calcGame) + ',<br/>';
            resultText += 'Медленный: ' + formatResult(calcSlow) + ',<br/>';
            resultText += 'Страниц текста всего: ' + calcPages + ',<br/>';

        result.error = false;
        // result.hrono = hrono;
        // result.soundTime = soundTime;
        result.calcStandart = calcStandart;
        result.calcGame = calcGame;
        result.calcSlow = calcSlow;
        result.calcPages = calcPages;
        result.resultText = resultText;

        result.textStandart = 'Стандартный: ' + formatResult(calcStandart) + '';
        result.textGame = 'Игровой: ' + formatResult(calcGame) + '';
        result.textSlow = 'Медленный: ' + formatResult(calcSlow) + '';
        result.textPages = 'Страниц текста всего: ' + calcPages + '';

        // for (var r = 70; r < 160; r += 10) {
        //         $('#snd_' + r).css({
        //             display: 'none'
        //         })
        // };
        // $('#snd_error').css({display: 'none'}),
        // 70 > soundTime ? $('#snd_error').css({display: 'block'}) :
        // soundTime > 69 && 80 > soundTime ? $('#snd_70').css({display: 'block'}) :
        // soundTime > 79 && 90 > soundTime ? $('#snd_80').css({display: 'block'}) :
        // soundTime > 89 && 100 > soundTime ? $('#snd_90').css({display: 'block'}) :
        // soundTime > 99 && 110 > soundTime ? $('#snd_100').css({display: 'block'}) :
        // soundTime > 109 && 120 > soundTime ? $('#snd_110').css({display: 'block'}) :
        // soundTime > 119 && 130 > soundTime ? $('#snd_120').css({display: 'block'}) :
        // soundTime > 129 && 140 > soundTime ? $('#snd_130').css({display: 'block'}) :
        // soundTime > 139 && 150 > soundTime ? $('#snd_140').css({display: 'block'}) :
        // soundTime > 149 && 160 > soundTime ? $('#snd_150').css({display: 'block'}) :
        // soundTime > 159 && $('#snd_error').css({display: 'block'}),
        // $('#txt2').html(resultText)

        //Наверное нужно в результат добавить этот код
        // if(soundTime < 70 || soundTime > 159) {
        //     result.sndError = "Нужного хронометража достичь не удалось!";
        // }
    };
    return result;
};

