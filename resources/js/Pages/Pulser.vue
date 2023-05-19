<template>
    <div class="pulser">
      <label for="pulse-speed">Pulse Speed:</label>
      <input type="range" id="pulse-speed" v-model="pulseSpeed" min="0.5" max="2" step="0.1" @input="updatePulseSpeed">
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const pulseSpeed = ref(1);

  const updatePulseSpeed = () => {
    emit('updatePulseSpeed', pulseSpeed.value);
  };
  </script>

  <style scoped>
  .pulser {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  #pulse-speed {
    width: 200px;
  }
  </style>
