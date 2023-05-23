<template>
    <div class="container mx-auto px-6 py-4">
        <h1 class="text-4xl font-bold my-6 text-center">Values</h1>
        <div v-for="(value, key) in values" :key="key" class="my-8 bg-white shadow-lg rounded-lg px-5 py-6">
            <h2 class="text-3xl font-semibold mb-4 text-purple-600">{{ value.title }}</h2>
            <p class="mt-2 text-gray-600 text-lg" v-html="renderLinks(value.content)"></p>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';

const webpage = ref({});

onMounted(async () => {
    try {
        const response = await fetch('/public/json/ami.json');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        webpage.value = await response.json();
    } catch (error) {
        console.error(error);
    }
});

const renderLinks = text => {
    return text.replace(/(http[s]?:\/\/[^\s]+)/g, url => `<a href="${url}" target="_blank" rel="noopener noreferrer">${url}</a>`);
}
</script>
