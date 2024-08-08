<template>
    <h3>Выберите тип заказа</h3>
    <div class="type_selectop" :class="{'selected':state}">
        <div @click="selectZakType('Голос')" :class="{'active':( props.modelValue == 'Голос' )}"  class="element">
            <div class="icon golos">
                <svg class="sprite_icon">
                    <use xlink:href="#voice"></use>
                </svg>
            </div>
            <hr>
            <h2>Голос</h2>
        </div>

        <div @click="selectZakType('Ролик')" :class="{'active':( props.modelValue == 'Ролик' )}" class="element">
            <div class="icon rolik">
                <svg class="sprite_icon">
                    <use xlink:href="#audio"></use>
                </svg>
            </div>
            <hr>
            <h2>Ролик</h2>
        </div>

        <div @click="selectZakType('IVR')" :class="{'active':( props.modelValue == 'IVR' )}" class="element">
            <div class="icon ivr">
                <svg class="sprite_icon">
                    <use xlink:href="#ivr"></use>
                </svg>
            </div>
            <hr>
            <h2>IVR</h2>
        </div>


        <div class="clearWrapper">
            <a href="#" @click.prevent="clearState" class="clr_btn graybtn">&#8634; Именить тип заказа</a>
        </div>
    </div>


</template>

<script setup>
import { ref } from 'vue';


    const props = defineProps({
        modelValue: Array
    })

    let state = ref(false)

    const emit = defineEmits(['update:modelValue'])

    const selectZakType = (type) => {
        state.value = true
        emit('update:modelValue', type)
    }

    const clearState = () => {
        state.value = false
        emit('update:modelValue', '')
    }

</script>
