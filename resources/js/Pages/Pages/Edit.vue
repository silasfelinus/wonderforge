<template>
    <div>
      <h1>Edit Page</h1>
      <form @submit.prevent="updatePage">
        <label for="image">Image URL:</label>
        <input id="image" v-model="image" required>

        <label for="creator">Creator:</label>
        <input id="creator" v-model="creator" required>

        <label for="webgallery">Web Gallery:</label>
        <input id="webgallery" v-model="webgallery" required>

        <label for="title">Title:</label>
        <input id="title" v-model="title" required>

        <label for="description">Description:</label>
        <textarea id="description" v-model="description" required></textarea>

        <label for="tags">Tags:</label>
        <textarea id="tags" v-model="tagsString" required></textarea>

        <button type="submit">Update</button>
      </form>
    </div>
  </template>

  <script>
  export default {
    props: {
      page: Object
    },
    data() {
      return {
        image: '',
        creator: '',
        webgallery: '',
        title: '',
        description: '',
        tagsString: '',
      }
    },
    created() {
      this.image = this.page.image;
      this.creator = this.page.creator;
      this.webgallery = this.page.webgallery;
      this.title = this.page.title;
      this.description = this.page.description;
      this.tagsString = this.page.tags.join(', ');
    },
    methods: {
      updatePage() {
        const tags = this.tagsString.split(',').map(tag => tag.trim());
        this.$inertia.put('/pages/' + this.page.id, { ...this.$data, tags });
      }
    }
  }
  </script>

  <style scoped>
  /* Add your styles here */
  </style>
