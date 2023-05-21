<template>
    <div class="flex flex-col h-screen bg-gray-200">
      <header class="py-4 bg-white shadow-md">
        <h1 class="text-center text-2xl font-bold">Welcome, {{ settings.getUser }}</h1>
      </header>

      <div class="flex flex-grow overflow-hidden">
        <aside v-if="showSidebar" class="w-64 bg-white shadow-md overflow-y-auto">
          <!-- Sidebar content -->
        </aside>

        <main class="flex-grow p-4 overflow-y-auto">
          <!-- Main content -->
          <h2 class="text-xl font-semibold mb-4">Settings</h2>
          <form @submit.prevent>
            <div class="mb-4">
              <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
              <input id="background" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" v-model="background" @blur="settings.setBackground(background)" />
            </div>

            <div class="mb-4">
              <label for="screenfx" class="block text-sm font-medium text-gray-700">ScreenFX</label>
              <input id="screenfx" type="text" class="mt-1 block w-full rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" v-model="screenfx" @blur="settings.setScreenFX(screenfx)" />
            </div>

            <div class="mb-4 flex items-center">
              <input id="activeSound" type="checkbox" class="rounded mr-2" v-model="activeSound" @change="settings.toggleSound" />
              <label for="activeSound" class="text-sm font-medium text-gray-700">Active Sound</label>
            </div>

            <div class="mb-4 flex items-center">
              <input id="activeChat" type="checkbox" class="rounded mr-2" v-model="activeChat" @change="settings.toggleChat" />
              <label for="activeChat" class="text-sm font-medium text-gray-700">Active Chat</label>
            </div>
          </form>
        </main>
      </div>

      <footer class="py-2 bg-white shadow-md text-center">
        <!-- Footer content -->
      </footer>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { useSettingsStore } from '../stores/settings';

  // Define the settings store
  const settings = useSettingsStore();

  // Handle the sidebar state
  const showSidebar = ref(false);
  const toggleSidebar = () => {
    showSidebar.value = !showSidebar.value;
  };

  // Reactive settings
  let background = ref(settings.getBackground());
  let screenfx = ref(settings.getScreenFX());
  let activeSound = ref(settings.getActiveSound());
  let activeChat = ref(settings.getActiveChat());
  </script>

