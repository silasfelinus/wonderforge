<template>
    <div>
      <h1>Create Gallery</h1>
      <form @submit.prevent="createGallery">
        <label for="name">Name:</label>
        <input id="name" v-model="name" required>

        <label for="creator">Creator:</label>
        <input id="creator" v-model="creator" required>

        <label for="url">URL:</label>
        <input id="url" v-model="url" required>

        <label for="description">Description:</label>
        <textarea id="description" v-model="description" required></textarea>

        <label for="fav_image">Favorite Image:</label>
        <input id="fav_image" v-model="fav_image">

        <label for="rating">Rating:</label>
        <input id="rating" v-model="rating" type="number" required>

        <label for="isMember">Is Member:</label>
        <input id="isMember" v-model="isMember" type="checkbox">

        <label for="isNSFW">Is NSFW:</label>
        <input id="isNSFW" v-model="isNSFW" type="checkbox">

        <label for="isPrivate">Is Private:</label>
        <input id="isPrivate" v-model="isPrivate" type="checkbox">

        <button type="submit">Create</button>
      </form>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        name: '',
        creator: '',
        url: '',
        description: '',
        fav_image: '',
        rating: 0,
        isMember: true,
        isNSFW: true,
        isPrivate: true,
      }
    },
    methods: {
      createGallery() {
        this.$inertia.post('/galleries', this.$data);
      }
    }
  }
  </script>
