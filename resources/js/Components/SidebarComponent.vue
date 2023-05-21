<template>
    <aside :style="{background: randomColor}">
      <!-- Place your sidebar content here -->
      <h2>Sidebar</h2>
      <p v-if="settings.getUser !== 'acroguest'">
        Welcome, {{ settings.getUser }}
      </p>
    </aside>
  </template>

  <script setup>
  import { useSettingsStore } from '../stores/settings'
  import useRandomColor from '../Composables/useRandomColor'

  const settings = useSettingsStore()
  const randomColor = useRandomColor()
  </script>

  <style scoped>
  /* Sidebar Styles */
  </style>
