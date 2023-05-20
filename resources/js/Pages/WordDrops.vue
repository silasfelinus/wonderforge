<template>
    <div class="word-container">
      <div v-for="(word, index) in words" :key="index" class="word">
        {{ word }}
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const words = ref([]);

  // Listen for the 'newWord' event from the parent component (or you can use provide/inject for this)
  const onNewWord = (newWord) => {
    words.value.push(newWord);

    // Limit the number of words to 100 (or any other number you choose)
    if (words.value.length > 100) {
      words.value.shift();
    }
  };

  // Call this method when the 'newWord' event is received
  onNewWord();

  </script>

  <style scoped>
  .word-container {
    position: relative;
    height: 100%;
  }

  .word {
    position: absolute;
    /* You can use CSS animation or JavaScript to animate the words falling down the screen */
  }
  </style>
