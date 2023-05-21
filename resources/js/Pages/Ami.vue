<template>
    <div class="flex flex-col h-screen bg-gradient-to-b from-blue-200 to-white">
      <!-- Header section -->
      <header class="p-5 bg-white shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800">Meet AMI - The Anti-Malaria Intelligence</h1>
        <a href="https://www.againstmalaria.com/amibot" class="text-blue-500">Support our fundraiser</a>
      </header>

      <!-- Main section -->
      <main class="flex flex-row justify-between p-10">
        <!-- Left Cards -->
        <div class="flex flex-col space-y-4">
          <div class="card bg-white shadow-lg rounded p-5">
            <h2 class="text-lg font-semibold text-gray-800">Card Title</h2>
            <p class="text-gray-600">This is a placeholder text for card description.</p>
          </div>
          <div class="card bg-white shadow-lg rounded p-5">
            <h2 class="text-lg font-semibold text-gray-800">Card Title</h2>
            <p class="text-gray-600">This is a placeholder text for card description.</p>
          </div>
        </div>

        <!-- ChatWindow -->
        <ChatWindow :store="store" :currentMessage="currentMessage" :sendMessage="sendMessage" :isLoading="isLoading"/>

        <!-- Right Cards -->
        <div class="flex flex-col space-y-4">
          <div class="card bg-white shadow-lg rounded p-5">
            <h2 class="text-lg font-semibold text-gray-800">Card Title</h2>
            <p class="text-gray-600">This is a placeholder text for card description.</p>
          </div>
          <div class="card bg-white shadow-lg rounded p-5">
            <h2 class="text-lg font-semibold text-gray-800">Card Title</h2>
            <p class="text-gray-600">This is a placeholder text for card description.</p>
          </div>
        </div>
      </main>

      <!-- Footer section -->
      <footer class="p-5 bg-white shadow-md">
        <form @submit.prevent="sendMessage" class="flex">
          <input
            v-model="currentMessage"
            :disabled="isLoading"
            placeholder="Type your message here..."
            class="flex-grow p-2 mr-2 border rounded"
          />
          <button
            type="submit"
            :disabled="isLoading"
            class="p-2 bg-blue-500 text-white rounded"
          >
            {{ isLoading ? 'Sending...' : 'Send' }}
          </button>
        </form>
      </footer>
    </div>
  </template>
  <script setup>
  import { ref } from 'vue';
  import { useStore } from '../stores/chat';
  import ChatWindow from './ChatWindow.vue';
  import {usePersonalityStore } from '../stores/personality';

  const personalityStore = usePersonalityStore();

  // Set personality traits for AMI bot
personalityStore.setBotName('AMI');
personalityStore.setBotImage('/images/amibot/amibot2.png');
personalityStore.setBotAvatar('/images/amibot/amibot3.png');
personalityStore.setBotPersonality('The Anti-Malaria Intelligence');

  const store = useStore();
  const currentMessage = ref('');
  const isLoading = ref(false);

  const sendMessage = async () => {
    if (!currentMessage.value.trim()) {
      return;
    }

    isLoading.value = true;

    try {
      await store.sendMessage(currentMessage.value);
    } catch (error) {
      // handle error
    } finally {
      currentMessage.value = '';
      isLoading.value = false;
    }
  };
  </script>
