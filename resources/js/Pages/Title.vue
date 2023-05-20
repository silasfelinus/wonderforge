<template>
    <div class="container mx-auto px-4 py-8">
      <div class="title text-4xl font-bold mb-4" :style="{fontFamily: currentFont.value, color: currentColor.value}">
        Cafe Purr
      </div>
      <div class="font-buttons grid grid-cols-3 gap-4 mb-4">
        <button v-for="font in fonts" :key="font" @click="changeFont(font)" class="gellie-button bg-blue-500 text-white py-2 px-4 rounded">
          {{ font }}
        </button>
      </div>
      <div class="color-buttons grid grid-cols-3 gap-4 mb-4">
        <Button v-for="color in colors" :key="color" @click="changeColor(color)" class="gellie-button py-2 px-4 rounded" :style="{background: color}">
          {{ color }}
        </Button>
      </div>
      <p v-if="errorMessage.value" class="error-message text-red-500 text-lg">{{ errorMessage.value }}</p>
    </div>
  </template>


  <script setup>
  import { ref } from 'vue';
  import Button from './Button.vue'

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
