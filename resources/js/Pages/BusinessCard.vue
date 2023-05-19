<template>
    <div class="card">
      <div class="card-content">
        <div
          class="image-container"
          :style="{ backgroundImage: `url(${imageUrl})` }"
        ></div>
        <h2 class="card-title">{{ title }}</h2>
        <p class="card-description">{{ description }}</p>
      </div>
    </div>
  </template>

  <script setup>
  defineProps({
    imageUrl: { type: String, default: '/assets/utility/card.webp' },
    title: String,
    description: String,
  });
  </script>

  <style scoped>
  .card {
    background: url('/assets/utility/card.webp');
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease-in-out;
    cursor: pointer;
  }

  .card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  }

  .card-content {
    padding: 20px;
  }

  .image-container {
    width: 100px;
    height: 100px;
    background-size: cover;
    background-position: center;
    border-radius: 50%;
  }

  .card-title {
    margin-top: 20px;
    font-size: 1.5em;
    font-weight: bold;
  }

  .card-description {
    margin-top: 10px;
    font-size: 1em;
  }
  </style>
