<template>
    <label for="type_calc">Выберите дикторов<span class="required">*</span>:</label>
    <div class="dictors_list_mini">
        <div
            @click.prevent="selectDictor(item.name)"
            :class="{active:props.modelValue.includes(item.name)}" class="dictor"
            v-for="item in store.getters.dictors" :key="item.id"
            v-show="!(props.multi == false && item.irv == 0)"
            >
            <div class="name">{{ item.name }}</div>
            <!-- <audio controls :src="item.file"></audio> -->
        </div>
    </div>
</template>

<script setup>
    import { watch, ref } from 'vue'
    import { useStore } from 'vuex'

    const props = defineProps({
        multi: Boolean,
        modelValue: Array
    })


    const store = useStore()
    const emit = defineEmits(['update:modelValue'])

    function selectDictor(item) {

        if (props.multi)
        {
            console.log(props.modelValue)
            if(props.modelValue.includes(item))
                props.modelValue.splice(props.modelValue.indexOf(item),1)
            else
                props.modelValue.push(item)
        } else {
            let mass = []
            mass.push(item)
            props.modelValue.splice(0, 2)
            props.modelValue.push(item)

            console.log(props.modelValue)
        }


        updateValue(props.modelValue)
    }

    function updateValue(value) {
        emit('update:modelValue', value)
    }

</script>

<style>

</style>
