<template>
    <div :background="settings.getBackground">
      <cafe-header />
      <rsidebar />
      <!-- Main Content -->
      <div><lsidebar>

        <chat-window /></lsidebar>
      </div>
      <div v-if="settings.getMessages && settings.getMessages.length">
        <h2>Messages:</h2>
        <p v-for="(message, index) in settings.getMessages" :key="index">
          {{ message }}
        </p>
      </div>
    </div>
    <footer class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
          <div class="flex items-center gap-4">
<TitleAnimation />
          </div>
        </div>
        <ButtonPulse class="bg-blue-500 w-16 h-16 rounded-full fixed bottom-4 right-4">
            Chat
        </ButtonPulse>
      </footer></template>


  <script setup>
  import CafeHeader from './CafeHeader.vue';
  import LSidebar from './LSidebar.vue';
  import RSidebar from './RSidebar.vue';
  import Footer from './Footer.vue';
  import ChatWindow from '../Components/ChatWindow.vue';

  </script>
