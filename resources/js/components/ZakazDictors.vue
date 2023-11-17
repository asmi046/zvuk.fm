<template>
    <div class="dictors_list_mini">
        <div @click.prevent="selectDictor(item.name)" :class="{active:selected_dictors.includes(item.name)}" class="dictor" v-for="item in store.getters.dictors" :key="item.id">
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

    let selected_dictors = props.modelValue?ref(props.modelValue):ref([])

    watch(() => props.modelValue.value, function(nv, old) {
        // console.log('33')
        // console.log(props.modelValue)
        // console.log(nv)
        // console.log(old)
        selected_dictors = props.modelValue?props.modelValue:[]
    });

    function selectDictor(item) {
        if (props.multi)
        {
            if(selected_dictors.value.includes(item))
                selected_dictors.value.splice(selected_dictors.value.indexOf(item),1)
            else
                selected_dictors.value.push(item)
        } else {
            selected_dictors.value = [item]
        }


        updateValue(selected_dictors)
    }

    function updateValue(value) {
        emit('update:modelValue', value)
    }

</script>

<style>

</style>
