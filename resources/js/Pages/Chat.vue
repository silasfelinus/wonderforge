<template>
    <div>
        <div v-for="(message, index) in messages" :key="index">
            {{ message }}
        </div>

        <input type="text" v-model="newMessage" @keyup.enter="sendMessage">
    </div>
</template>

<script setup>
import { ref } from 'vue';

let messages = ref([]);
let newMessage = ref('');

function sendMessage() {
    messages.value.push(newMessage.value);
    newMessage.value = '';
}
</script>
