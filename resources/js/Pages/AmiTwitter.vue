<template>
    <main class="flex-grow p-5 overflow-auto" ref="chatWindow">
      <img :src="personalityStore.botImage" alt="Bot Avatar" class="w-24 h-24 mx-auto rounded-full" />
      <ButterflyGroup />

      <!-- Chat history -->
      <div class="mt-4 space-y-4">
        <div v-for="(message, index) in store.chatHistory" :key="index" class="max-w-md mx-auto flex items-start">
          <img v-if="message.user === 'You'" src="/images/avatars/avatar2.png" alt="User Icon" class="w-8 h-8 mr-2">
          <img v-else :src="personalityStore.botImage" alt="Bot Icon" class="w-8 h-8 mr-2">
          <div :class="`p-2 rounded ${message.user === 'You' ? 'bg-blue-500 text-white ml-auto' : 'bg-gray-300 text-gray-800 mr-auto'}`">
            <p>{{ message.content }}</p>
          </div>
        </div>

        <div v-if="isLoading" class="typing-indicator">
          <img :src="personalityStore.botImage" alt="Bot Icon" class="w-8 h-8 mr-2">
          {{ personalityStore.botName }} is typing...
        </div>
      </div>
    </main>
  </template>

  <script setup>
  import { ref, watch, onMounted, nextTick } from 'vue';
  import ButterflyGroup from './ButterflyGroup.vue';
  import { usePersonalityStore } from '../stores/personality'

const personalityStore = usePersonalityStore();

  const props = defineProps({
    store: {
      type: Object,
      required: true,
    },
    currentMessage: {
      type: Object,
      required: true,
    },
    sendMessage: {
      type: Function,
      required: true,
    },
    isLoading: {
      type: Object,
      required: true,
    },
  });

  const chatWindow = ref(null);

  watch(props.store.chatHistory, async () => {
    await nextTick();
    if (chatWindow.value) {
      chatWindow.value.scrollTop = chatWindow.value.scrollHeight;
    }
  });

  onMounted(async () => {
    await nextTick();
    if (chatWindow.value) {
      chatWindow.value.scrollTop = chatWindow.value.scrollHeight;
    }
  });
  </script>
