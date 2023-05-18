<template>
    <div>
      <h2>{{ image.title }}</h2>
      <img :src="image.image_url" alt="Image URL" />
      <p>{{ image.description }}</p>
      <!-- Add more fields as necessary -->
      <router-link :to="`/images/${image.id}/edit`">Edit</router-link>
    </div>
  </template>

  <script setup>

  const { image } = usePage().props
  </script>
