<template>
    <div class="container" @mousemove="moveCircles">
      <div v-for="i in 3" :key="i" :class="`circle circle-${i}`"></div>
      <button
        :style="{ backgroundColor: color.randomColor }"
        @click="color.generateRandomColor"
        class="goopy-button"
      >
        Click me
      </button>
    </div>
  </template>

  <script setup>
  import { useRandomColor } from './../Composables/useRandomColor';

  const color = useRandomColor();

  function moveCircles(event) {
    const x = event.clientX / window.innerWidth;
    const y = event.clientY / window.innerHeight;
    for (let i = 1; i <= 3; i++) {
      const circle = document.querySelector(`.circle-${i}`);
      const delay = i * 0.07;
      circle.style.transform = `translate(${x * 50 * delay}px, ${y * 50 * delay}px)`;
    }
  }
  </script>

  <style scoped>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: radial-gradient(circle at center, transparent, black);
  }

  .goopy-button {
    padding: 30px;
    font-size: 20px;
    color: #FFF;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border-radius: 50%;
  }

  .circle {
    position: absolute;
    border-radius: 50%;
    border: 2px solid white;
    animation: rotate 5s linear infinite;
  }

  .circle-1 {
    width: 200px;
    height: 200px;
  }

  .circle-2 {
    width: 300px;
    height: 300px;
  }

  .circle-3 {
    width: 400px;
    height: 400px;
  }

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  </style>
