<template>
    <div class="navigation" :style="{ backgroundImage: `url(${page.image})` }">
      <h1>{{ page.title }}</h1>
      <p>{{ page.description }}</p>
      <p>Created by: {{ page.creator }}</p>
      <div class="tags">
        <span v-for="tag in page.tags" :key="tag">{{ tag }}</span>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      page: Object
    }
  }
  </script>

  <style scoped>
  .navigation {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    z-index: 9999;
  }
  </style>
