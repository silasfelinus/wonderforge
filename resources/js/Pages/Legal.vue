<template>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold my-4">{{ legal.title }}</h1>
        <div v-for="(value, key) in legal" :key="key" v-if="key !== 'title'" class="my-4">
            <h2 class="text-2xl font-semibold">{{ value.title }}</h2>
            <p class="mt-2">{{ value.content }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const legal = ref({});

onMounted(async () => {
    try {
        const response = await fetch('/json/legal.json');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        legal.value = await response.json();
    } catch (error) {
        console.error(error);
    }
});
</script>

<style scoped>
</style>
