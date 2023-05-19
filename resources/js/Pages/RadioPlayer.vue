<!-- RadioPlayer.vue -->
<template>
    <div class="radio-control-panel">
      <button @click="togglePlay">{{ isPlaying ? 'Stop' : 'Play' }}</button>
      <input type="range" min="0" max="1" step="0.1" v-model="volume" @input="changeVolume">
      <select v-model="selectedStation" @change="changeStation">
        <option v-for="station in stations" :value="station.url_resolved">{{ station.name }}</option>
      </select>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';

  const isPlaying = ref(false);
  const volume = ref(1);
  const selectedStation = ref(null);
  const stations = ref([]);
  const audio = ref(null);

  const togglePlay = () => {
    isPlaying.value = !isPlaying.value;
    isPlaying.value ? audio.value.play() : audio.value.pause();
  };

  const changeVolume = () => {
    audio.value.volume = volume.value;
  };

  const changeStation = () => {
    audio.value.src = selectedStation.value;
    if (isPlaying.value) {
      audio.value.play();
    }
  };

  onMounted(async () => {
    // Fetch the radio stations from the Radio Browser API
    const response = await fetch('http://api.radio-browser.info/json/stations/bycountry/united%20states?hidebroken=true');
    const data = await response.json();
    stations.value = data;
    selectedStation.value = stations.value[0].url_resolved;
    audio.value = new Audio(selectedStation.value);
    audio.value.volume = volume.value;
  });
  </script>

  <style scoped>
  /* Add your CSS styles here */
  </style>
