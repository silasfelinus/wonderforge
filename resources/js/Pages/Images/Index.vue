<template>
    <div>
      <div v-for="image in images" :key="image.id">
        <h2>{{ image.title }}</h2>
        <img :src="image.image_url" alt="Image URL" />
        <p>{{ image.description }}</p>
        <!-- Add more fields as necessary -->
        <button @click="deleteImage(image.id)">Delete</button>
        <router-link :to="`/images/${image.id}`">View</router-link>
      </div>
    </div>
  </template>

  <script setup>

  const { images } = usePage().props

  const deleteImage = async (id) => {
    await fetch(`/api/images/${id}`, {
      method: 'DELETE',
    })
    // Refresh the page after deleting an image
    location.reload()
  }
  </script>
