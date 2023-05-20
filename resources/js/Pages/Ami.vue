<template>
    <div class="flex flex-col h-screen bg-gray-100">
      <!-- Header section -->
      <header class="p-5 bg-white shadow-md">
        <h1 class="text-2xl font-semibold text-gray-800">Meet AMI - The Anti-Malaria Intelligence</h1>
        <a href="https://www.againstmalaria.com/amibot" class="text-blue-500">Support our fundraiser</a>
      </header>

      <!-- Main section -->
      <main class="flex-grow p-5">
        <img src="/images/amibot/amibot1.png" alt="AmiBot" class="w-24 h-24 mx-auto rounded-full">
        <ButterflyGroup />

        <!-- Error message -->
        <div v-if="errorMessage.value" class="mt-5 text-center text-red-500">
          <p>{{ errorMessage.value }}</p>
        </div>
      </main>

      <!-- Footer section -->
      <footer class="p-5 bg-white shadow-md">
        <ChatWindow class="rounded-full"/>
      </footer>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue'
  import { useAxios } from "../Composables/useAxios";
  import ChatWindow from '../Components/ChatWindow.vue'
  import ButterflyGroup from './ButterflyGroup.vue'

  // Get error message ref from useAxios
  const { errorMessage } = useAxios();
  </script>
