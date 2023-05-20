<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-2">
      <h1 class="text-2xl font-semibold mb-4">Settings</h1>
      <div class="mb-2">
        <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
        <input id="background" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" v-model="background" @blur="updateBackground" />
      </div>
      <div class="mb-2">
        <label for="screenfx" class="block text-sm font-medium text-gray-700">Screen FX</label>
        <input id="screenfx" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" v-model="screenfx" @blur="updateScreenFX" />
      </div>
      <!-- other form fields as per your requirements -->

      <!-- Below is an example of how you could toggle activeSound and activeChat -->
      <div class="mb-2">
        <input id="activeSound" type="checkbox" class="rounded" v-model="activeSound" @change="toggleSound" />
        <label for="activeSound" class="ml-2 text-sm font-medium text-gray-700">Active Sound</label>
      </div>
      <div class="mb-2">
        <input id="activeChat" type="checkbox" class="rounded" v-model="activeChat" @change="toggleChat" />
        <label for="activeChat" class="ml-2 text-sm font-medium text-gray-700">Active Chat</label>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, watchEffect } from 'vue';
  import { useSettingsStore } from '/stores/useSettingsStore';

  const settingsStore = useSettingsStore();

  let background = ref(settingsStore.getBackground());
  let screenfx = ref(settingsStore.getScreenFX());
  let activeSound = ref(settingsStore.getActiveSound());
  let activeChat = ref(settingsStore.getActiveChat());

  watchEffect(() => {
    background.value = settingsStore.getBackground();
    screenfx.value = settingsStore.getScreenFX();
    activeSound.value = settingsStore.getActiveSound();
    activeChat.value = settingsStore.getActiveChat();
  });

  const updateBackground = () => {
    settingsStore.setBackground(background.value);
  };

  const updateScreenFX = () => {
    settingsStore.setScreenFX(screenfx.value);
  };

  const toggleSound = () => {
    settingsStore.toggleSound();
  };

  const toggleChat = () => {
    settingsStore.toggleChat();
  };
  </script>
