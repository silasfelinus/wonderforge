<template>
    <div class="frame-image" @art="moveUp" @not-art="dropDown">
      <slot></slot>
    </div>
  </template>

  <script setup>
  import { ref } from 'vue';

  const moveUp = () => {
    console.log('Move frame up');
    // TODO: Animate the frame moving up
  };

  const dropDown = () => {
    console.log('Drop frame down');
    // TODO: Animate the frame dropping down
  };
  </script>
  <style scoped>

  .frame-image {
    border: 8px solid #8B4513; /* A wooden frame color */
    box-sizing: border-box; /* To include the border in the element's total width and height */
  }
  </style>
