<template>
    <div class="container mx-auto px-6 py-4 bg-gray-100 min-h-screen">
        <section v-if="loading" class="text-2xl text-center py-20">
            Loading...
        </section>
        <section v-else-if="error" class="text-red-500 text-center py-20">
            {{ error }}
        </section>
        <section v-else>
            <!-- Welcome Section -->
            <section class="mb-8">
                <h1 class="text-4xl mb-4 font-bold text-blue-800">{{ webpage.welcome_message }}</h1>
                <p class="text-lg text-gray-700">{{ webpage.mission_statement }}</p>
                <img class="w-48 mx-auto my-6 rounded-md shadow-md" src="/images/amibot/amibot1.png" alt="Ami bot">
                <p class="text-lg text-gray-700">{{ webpage.description }}</p>
                <p class="text-lg text-gray-700">{{ webpage.goal }}</p>
                <img class="w-48 mx-auto my-6 rounded-md shadow-md" src="/images/amibot/amibot2.png" alt="Ami bot">
                <p class="text-lg text-gray-700">{{ webpage.call_to_action }}</p>
                <p class="text-lg text-blue-700 text-center">{{ webpage.share_link_message }}</p>
                <p class="text-lg text-gray-700">{{ webpage.closing_message }}</p>
            </section>

            <!-- AmiGames Section -->
            <section class="mb-8 bg-white p-4 rounded-md shadow-md">
                <h2 class="text-3xl mb-2 font-bold text-blue-800">Ami Games</h2>
                <div v-for="(value, key) in amiGames" :key="key" class="mb-4">
                    <h3 class="text-2xl mb-1 font-semibold text-gray-800">{{ key }}</h3>
                    <p class="text-lg text-gray-700">{{ value }}</p>
                </div>
            </section>

            <!-- Todos Section -->
            <section class="bg-white p-4 rounded-md shadow-md">
                <h2 class="text-3xl mb-2 font-bold text-blue-800">To Do</h2>
                <div v-for="(value, key) in todos" :key="key" class="mb-4">
                    <h3 class="text-2xl mb-1 font-semibold text-gray-800">{{ key }}</h3>
                    <p class="text-lg text-gray-700">{{ value }}</p>
                </div>
            </section>
        </section>
        <Ami></Ami>
        <section class="text-center py-10">
            <img class="w-48 mx-auto rounded-md shadow-md" src="/images/amibot/amibot3.png" alt="Ami bot">
        </section><NavDrawer />
    </div>
</template>





<script setup>
import { ref } from 'vue';
import Ami from './Ami.vue';

const webpage = ref({});
const amiGames = ref({});
const todos = ref({});
const loading = ref(true);
const error = ref(null);

axios.get('/json/ami.json')
    .then(response => {
        webpage.value = response.data.webpage;
        amiGames.value = response.data.amiGames;
        todos.value = response.data.todos;
        loading.value = false;
    })
    .catch(e => {
        error.value = 'Failed to fetch data';
        loading.value = false;
    });
</script>
