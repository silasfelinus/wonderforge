<template>
    <div class="art-critic">
      <RandomImage :folder="currentFolder" :key="imageKey" />

      <div class="buttons">
        <button @click="judgeArt(true)">Art</button>
        <button @click="judgeArt(false)">Not Art</button>
      </div>

      <div class="lights">
        <div class="light" :class="{ 'green-light': isArt, 'red-light': isArt === false }"></div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue'
  import RandomImage from './RandomImage.vue'

  const folders = ['background', 'home', 'memes', 'ranch', 'redbubble', 'splash', 'wonderbot', 'wondercat', 'wondershed']
  const currentFolder = ref(folders[0])
  let isArt = ref(null)
  let imageKey = ref(0)

  const judgeArt = (judgement) => {
    isArt.value = judgement
    imageKey.value++ // increment key to force re-render of RandomImage
  }
  </script>

  <style scoped>
  .green-light {
    background-color: green;
  }

  .red-light {
    background-color: red;
  }
  </style>
