<template>
    <div>
      <h1>All Galleries</h1>
      <div v-for="gallery in galleries" :key="gallery.id">
        <h2>{{ gallery.title }}</h2>
        <p>{{ gallery.description }}</p>
        <inertia-link :href="'/galleries/' + gallery.id">View</inertia-link>
        <inertia-link :href="'/galleries/edit/' + gallery.id">Edit</inertia-link>
        <button @click="deleteGallery(Gallery.id)">Delete</button>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      pages: Array
    },
    methods: {
      deleteGallery(id) {
        this.$inertia.post('/galleries/delete/' + id);
      }
    }
  }
  </script>
