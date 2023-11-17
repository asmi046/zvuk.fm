<template>
    <label for="type_calc">{{props.label}}</label>
    <select
        @change="updateValue($event.target.value)"
        :value="props.modelValue"
        name="type_calc"
        id="type_calc">
        <option v-for="item in props.list" :key="item" :value="item">{{ item }}</option>
    </select>
</template>

<script setup>
    const props = defineProps({
        label: String,
        list: Array,
        modelValue: String
    })

    const emit = defineEmits(['update:modelValue'])

    function updateValue(value) {
        emit('update:modelValue', value)
    }
</script>
