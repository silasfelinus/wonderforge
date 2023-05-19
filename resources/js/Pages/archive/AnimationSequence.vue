<template>
    <div id="animation-launcher">
      <nav>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
      </nav>
      <div class="controls">
        <button @click="stopAnimations">Stop</button>
        <button @click="fastForwardAnimations">Fast Forward</button>
        <button @click="toggleLoop">Toggle Loop</button>
      </div>
      <Animation v-for="i in 3" :key="i" :name="'animation' + i" :loop="loop" />
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';
  import Animation from './Animation.vue';

  const loop = ref(false);

  const stopAnimations = () => {
    // Implement logic to stop animations
  };

  const fastForwardAnimations = () => {
    // Implement logic to fast forward animations
  };

  const toggleLoop = () => {
    loop.value = !loop.value;
  };
  </script>

  <style scoped>
  #animation-launcher {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f5f5f5;
  }

  nav {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 20px;
  }

  .controls {
    display: flex;
    gap: 20px;
    margin-bottom: 50px;
  }

  button {
    padding: 10px 20px;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    background-color: #333;
    color: #fff;
    cursor: pointer;
  }

  button:hover {
    background-color: #666;
  }
  </style>
