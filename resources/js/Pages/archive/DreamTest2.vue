<template>
    <div class="animation-container">
      <transition name="fade" mode="out-in">
        <RandomImage :key="imageKey" />
      </transition>

      <Wildcard name="DreamScenarios" />
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import RandomImage from './RandomImage.vue';
  import Wildcard from './Wildcard.vue';

  const imageKey = ref(0);

  onMounted(() => {
    // Update the key every 5 seconds to fetch a new random image
    setInterval(() => {
      imageKey.value++;
    }, 5000);
  });
  </script>

  <style scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
  </style>
