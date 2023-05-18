<template>
    <div class="background">
      <img :src="randomImage" alt="Background Image" />
    </div>
  </template>

<script setup>
import { ref, onMounted } from 'vue';
import home1 from '/public/assets/galleries/home/home1.png';
import home2 from '/public/assets/galleries/home/home2.png';

const images = [home1, home2];
const randomImage = ref('');

onMounted(() => {
  const randomIndex = Math.floor(Math.random() * images.length);
  randomImage.value = images[randomIndex];
});
</script>

  <style scoped>
  .background {
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
  }

  .background img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  </style>
