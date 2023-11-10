import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler';

import ChronoCalc from "./components/ChronoCalc.vue"

import axios from 'axios'
import VueAxios from 'vue-axios'

import { VMaskDirective } from 'v-slim-mask'

import { store } from "./storage"
import { useStore } from 'vuex'

const global_app = createApp({
    components:{
        ChronoCalc
    },

    setup() {
        const store = useStore()

        store.dispatch('getDictors');
    },
})

global_app.use(VueAxios, axios)
global_app.use(store)
global_app.directive('mask', VMaskDirective)
global_app.mount("#main");
