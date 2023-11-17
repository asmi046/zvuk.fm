<template>
    <div class="dictors_list_mini">
        <div @click.prevent="selectDictor(item)" :class="{active:selected_dictors.includes(item)}" class="dictor" v-for="item in store.getters.dictors" :key="item.id">
            <div class="name">{{ item.name }}</div>
            <!-- <audio controls :src="item.file"></audio> -->
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import { useStore } from 'vuex'

    const store = useStore()
    let selected_dictors = ref([])

    function selectDictor(item) {
        selected_dictors.value.push(item)
    }

</script>

<style>

</style>
