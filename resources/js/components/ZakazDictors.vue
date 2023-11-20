<template>
    <div class="dictors_list_mini">
        <div @click.prevent="selectDictor(item.name)" :class="{active:props.modelValue.includes(item.name)}" class="dictor" v-for="item in store.getters.dictors" :key="item.id">
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


    // watch(() => [props.modelValue.value], function(nv, old) {
    //     console.log('33')
    //     console.log(props.modelValue.value)
    //     console.log(nv.value)
    //     console.log(old.value)
    //     selected_dictors.value = nv
    // });

    function selectDictor(item) {

        if (props.multi)
        {
            console.log(props.modelValue)
            if(props.modelValue.includes(item))
                props.modelValue.value.splice(props.modelValue.value.indexOf(item),1)
            else
                props.modelValue.value.push(item)
        } else {
            props.modelValue.value = [item]
            console.log(props.modelValue.value)
        }


        updateValue(props.modelValue.value)
    }

    function updateValue(value) {
        emit('update:modelValue', value)
    }

</script>

<style>

</style>
