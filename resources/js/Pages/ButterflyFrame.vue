<template>
    <div class="container">
      <RectangleFrame :width="frameWidth" :height="frameHeight" />
      <FloppyRope :length="ropeLength" :angle="ropeAngle" />
      <ButterflySingle :x="butterflyX" :y="butterflyY" />
    </div>
  </template>

  <script setup lang="ts">
  import { ref } from 'vue';
  import ButterflySingle from './ButterflySingle.vue';
  import FloppyRope from './FloppyRope.vue';
  import RectangleFrame from './PictureFrame.vue';

  const frameWidth = ref(100);
  const frameHeight = ref(50);
  const ropeLength = ref(100);
  const ropeAngle = ref(45);
  const butterflyX = ref(50);
  const butterflyY = ref(50);

  // Code to handle the animation of the rope and the butterfly goes here
  </script>

  <style scoped>
  .container {
    position: relative;
  }
  </style>
