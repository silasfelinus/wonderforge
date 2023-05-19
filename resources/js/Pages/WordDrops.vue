<template>
    <div class="weather-container">
      <div
        v-for="(_, index) in numberOfDrops"
        :key="index"
        class="rain-drop"
        :style="{
          left: randomXPosition() + 'px',
          top: randomYPosition() + 'px',
          animationDuration: calculateDuration(randomSize()) + 's',
          animationDelay: randomDelay() + 's',
          fontSize: randomSize() + 'em',
          transform: initialTransform(),
        }"
      >
        {{ randomWord() }}
        <div
          class="splash"
          :style="{ animationDelay: calculateDuration(randomSize()) + 's' }"
        ></div>
      </div>
    </div>
  </template>

  <script setup lang="ts">
  import { ref, onMounted } from 'vue';

  const intensity = ref(2);
  const numberOfDrops = ref(100);
  const windAngle = ref(0);

  const words = ['North Coast', 'California', 'Humboldt County', 'Next-Generation', 'Community', 'ChatGPT', 'Stable-Diffusion', 'Midjourney', 'Art Design Lab', 'Foster Cat Rescue', 'Anti-Malaria Fundraiser', 'Post-Modern Salon', 'Non-Evil Art Museum', 'love', 'hope', 'intention', 'design', 'grace'];

  onMounted(() => {
    document.documentElement.style.setProperty(
      "--wind-angle",
      `${windAngle.value}deg`
    );
  });

  const randomXPosition = () => Math.floor(Math.random() * window.innerWidth);
  const randomYPosition = () => Math.floor(Math.random() * -window.innerHeight);
  const calculateDuration = (size) => (window.innerHeight / (50 * intensity.value)) * (size / 2);
  const randomDelay = () => Math.random() * 2;
  const randomSize = () => 1 + Math.random() * 3;
  const randomWord = () => words[Math.floor(Math.random() * words.length)];
  const initialTransform = () => `translateY(-100%) rotate(${windAngle.value + Math.floor(Math.random() * 21) - 10}deg)`;
  </script>

  <style>
  /* ...existing styles... */

  .rain-drop {
  position: absolute;
  color: #00b0ff;
  opacity: 0.5;
  animation: fall linear infinite forwards;
  will-change: transform;
}
</style>
