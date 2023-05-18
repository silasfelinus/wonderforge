<template>
    <div class="relative h-screen bg-cover bg-center" :style="{ backgroundImage: `url(${page.image})` }">
      <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center text-white px-4">
        <h1 class="text-5xl font-bold mb-4">{{ page.title }}</h1>
        <p class="text-xl mb-4">{{ page.description }}</p>
        <p class="mb-4">Created by: {{ page.creator }}</p>
        <p class="mb-4">Web Gallery: {{ page.webgallery }}</p>
        <p class="mb-4">Tags:</p>
        <ul class="mb-4">
          <li v-for="tag in page.tags" :key="tag" class="inline-block bg-red-500 px-2 py-1 rounded mr-2">{{ tag }}</li>
        </ul>
        <inertia-link :href="'/pages/edit/' + page.id" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</inertia-link>
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
