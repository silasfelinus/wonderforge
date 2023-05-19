<template>
    <div class="flex items-center justify-center gap-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
      <button @click="changeColorAndPulse" :style="{ backgroundColor: randomColor }" class="w-50 h-50 rounded-full border-none cursor-pointer outline-none transition-colors duration-300" aria-label="Change color and pulse"></button>
      <div class="waves" :style="{ animationDuration: pulseSpeed + 's', backgroundColor: randomColor }"></div>
      <ButterflyGroup />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRandomColor } from './../Composables/useRandomColor';
import ButterflyGroup from './ButterflyGroup.vue';

const pulseSpeed = ref(2);
const { randomColor, generateRandomColor } = useRandomColor();

const changeColorAndPulse = () => {
  generateRandomColor();
  console.log('Button clicked. New color:', randomColor.value);
  pulseSpeed.value = Math.random() * (4 - 1) + 1;
};
</script>

<style scoped>
  .waves {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    animation: pulse 1s infinite;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
      opacity: 1;
    }
    100% {
      transform: scale(2);
      opacity: 0;
    }
  }
</style>
