<template>
    <div class="container">
      <div class="title" :style="{fontFamily: currentFont.value, color: currentColor.value}">
        Cafe Purr
      </div>
      <div class="font-buttons">
        <button v-for="font in fonts" :key="font" @click="changeFont(font)" class="gellie-button">
          {{ font }}
        </button>
      </div>
      <div class="color-buttons">
        <button v-for="color in colors" :key="color" @click="changeColor(color)" class="gellie-button" :style="{background: color}">
          {{ color }}
        </button>
      </div>
      <p v-if="errorMessage.value" class="error-message">{{ errorMessage.value }}</p>
      <RadioPlayer />
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import RadioPlayer from './RadioPlayer.vue';

  const currentFont = ref('Roboto');
  const fonts = ['Roboto', 'Arial', 'Times New Roman', 'Courier New', 'Verdana', 'Georgia', 'Palatino', 'Garamond', 'Bookman', 'Avant Garde', 'Trebuchet MS', 'Arial Black', 'Impact'];
  const currentColor = ref('black');
  const colors = ['black', 'red', 'blue', 'green', 'purple', 'orange'];
  const errorMessage = ref('');

  const changeFont = (font) => {
    if (document.fonts.check(`12px ${font}`)) {
      currentFont.value = font;
      errorMessage.value = '';
    } else {
      errorMessage.value = `The font "${font}" is not available on your system.`;
    }
  };

  const changeColor = (color) => {
    currentColor.value = color;
  };
  </script>

  <style scoped>
  /* Add your CSS styles here */
  .error-message {
    color: red;
    margin-top: 20px;
  }
  </style>
