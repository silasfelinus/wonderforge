<template>
    <div
      class="rope"
      :style="{
        height: length + 'px',
        transform: 'rotate(' + angle + 'deg)',
      }"
    ></div>
  </template>

  <script setup lang="ts">
  import { ref } from 'vue';

  const props = defineProps<{
    length?: number;
    angle?: number;
  }>();

  const length = ref(props.length || 100);
  const angle = ref(props.angle || 0);
  </script>

  <style scoped>
  .rope {
    width: 2px;
    background-color: #a6a6a6;
    position: absolute;
  }
  </style>
