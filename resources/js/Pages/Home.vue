<template>
    <AppLayout :background="settings.getBackground">
      <header-component />
      <sidebar-component />
      <!-- Main Content -->
      <div>
        <login-link v-if="settings.getUser === 'acroguest'" />
        <register-link v-if="settings.getUser === 'acroguest'" />
        <chat-window />
      </div>
      <div v-if="settings.getMessages.length">
        <h2>Messages:</h2>
        <p v-for="(message, index) in settings.getMessages" :key="index">
          {{ message }}
        </p>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import { useSettingsStore } from '../stores/settings'
  import AppLayout from '../Layouts/AppLayout'
  import HeaderComponent from '../Components/HeaderComponent'
  import SidebarComponent from '../Components/SidebarComponent.vue'
  import LoginLink from '../Components/PrimaryButton.vue'
  import RegisterLink from '../Components/SecondaryButton.vue'
  import ChatWindow from '../Components/ChatWindow.vue'

  // use Settings Store
  const settings = useSettingsStore()
  </script>
