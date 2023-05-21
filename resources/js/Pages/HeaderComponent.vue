<template>
    <header :style="{background: randomColor}">
      <!-- Place your header content here -->
      <h1>Header</h1>
    </header>
  </template>

  <script setup>
  import useRandomColor from '../Composables/useRandomColor'

  const randomColor = useRandomColor()
  </script>

  <style scoped>
  /* Header Styles */
  </style>

