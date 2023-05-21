<template>
  <div>
    <ButterflySingle
      v-for="(butterfly, index) in butterflies"
      :key="index"
      :x="butterfly.x"
      :y="butterfly.y"
    />
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import ButterflySingle from './ButterflySingle.vue';

const butterflies = ref([
  { x: 100, y: 100 },
  { x: 200, y: 700 },
  { x: 400, y: 200 },
  { x: 800, y: 500 },
  { x: 500, y: 300 },
  { x: 600, y: 400 },
  { x: 650, y: 90 },
  { x: 900, y: 100 },
  { x: 100, y: 100 },
  { x: 200, y: 700 },
  { x: 400, y: 200 },
  { x: 800, y: 500 },
  { x: 500, y: 300 },
  { x: 600, y: 400 },
  { x: 650, y: 90 },
  { x: 900, y: 100 },
  // Add more initial butterflies here if desired
]);
</script>

