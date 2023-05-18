<template>
    <div>
      <h1>All Pages</h1>
      <div v-for="page in pages" :key="page.id">
        <h2>{{ page.title }}</h2>
        <p>{{ page.description }}</p>
        <inertia-link :href="'/pages/' + page.id">View</inertia-link>
        <inertia-link :href="'/pages/edit/' + page.id">Edit</inertia-link>
        <button @click="deletePage(page.id)">Delete</button>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      pages: Array
    },
    methods: {
      deletePage(id) {
        this.$inertia.post('/pages/delete/' + id);
      }
    }
  }
  </script>
