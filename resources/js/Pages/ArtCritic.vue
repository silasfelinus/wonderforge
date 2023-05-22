<template>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-100">
        <ButterflyFrame><RandomImage :folder="currentFolder" :key="imageKey" class="mb-10" /></ButterflyFrame>

      <div class="flex space-x-5 mb-10">
        <button @click="judgeArt(true)" class="p-4 bg-blue-500 text-white rounded-lg focus:outline-none">Art</button>
        <button @click="judgeArt(false)" class="p-4 bg-red-500 text-white rounded-lg focus:outline-none">Not Art</button>
      </div>

      <div class="flex justify-center">
        <div class="w-16 h-16 rounded-full bg-red-500" :class="{ 'bg-green-500': isArt, 'bg-red-500': isArt === false }"></div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, watchEffect } from 'vue';
  import RandomImage from './RandomImage.vue';
  import ButterflyFrame from "./ButterflyFrame.vue";

  // Image state
  const imageKey = ref(0);
  const currentFolder = ref('default');

  // Judgement state
  const isArt = ref(null);

  // Fetch random image whenever imageKey changes
  const { imageUrl } = RandomImage(currentFolder.value);
  watchEffect(() => {
    imageKey.value++;
  });

  function judgeArt(judgement) {
    isArt.value = judgement;
    imageKey.value++;
  }

  </script>
