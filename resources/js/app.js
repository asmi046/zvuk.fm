import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';

import ChronoCalc from "./components/ChronoCalc.vue"

import axios from 'axios'
import VueAxios from 'vue-axios'

import { VMaskDirective } from 'v-slim-mask'

const global_app = createApp({
    components:{
        ChronoCalc
    }
})

global_app.use(VueAxios, axios)
global_app.directive('mask', VMaskDirective)
global_app.mount("#main");
