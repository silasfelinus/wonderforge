<template>
    <div class="flex items-center justify-center">
      <div :style="{ backgroundColor: randomColor.value }" class="waves" @click="changeColorAndPulse">
        <button class="pulse-button" aria-label="Change color and pulse">
          <span class="button-label">{{ label }}</span>
        </button>
      </div>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import { useRandomColor } from './../Composables/useRandomColor';

  const { randomColor, generateRandomColor } = useRandomColor();
  const label = ref(1);

  const changeColorAndPulse = () => {
    generateRandomColor();
    label.value++;
    console.log('Button clicked. New color:', randomColor.value);
  };
  </script>

  <style scoped>
  .waves {
    position: relative;
    width: 5rem;
    height: 5rem;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    z-index: 1;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .waves::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    background-color: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    z-index: 2;
    transform: translate(-50%, -50%) scale(0);
    animation: pulse 2s infinite;
  }

  .pulse-button {
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 50%;
    outline: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .button-label {
    font-size: 1rem;
    color: white;
  }

  @keyframes pulse {
    0% {
      transform: translate(-50%, -50%) scale(0);
    }

    50% {
      transform: translate(-50%, -50%) scale(1);
    }

    100% {
      transform: translate(-50%, -50%) scale(0);
    }
  }
  </style>
