<template>
    <div>
      <div v-for="(message, index) in messages" :key="index">
        <p><strong>{{ message.sender }}:</strong> {{ message.content }}</p>
      </div>
      <form @submit.prevent="sendMessage">
        <input v-model="newMessage" placeholder="Type your message...">
        <button type="submit">Send</button>
      </form>
      <p v-if="errorMessage.value">{{ errorMessage.value }}</p>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue'
  import { useAxios } from "../Composables/useAxios";

  const messages = ref([])
  const newMessage = ref('')
  const { post, errorMessage, clearError } = useAxios();

  const sendMessage = async () => {
    if (newMessage.value) {
      try {
        messages.value.push({ sender: 'You', content: newMessage.value })
        const response = await post("/api/chat", { message: newMessage.value });
        messages.value.push({ sender: 'AMI', content: response.data.message })
        newMessage.value = ''
      } catch(err) {
        // handle the error
        console.error(err)
      } finally {
        clearError()
      }
    }
  }
  </script>
