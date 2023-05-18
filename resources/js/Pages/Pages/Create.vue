<template>
    <div>
      <h1>Create Page</h1>
      <form @submit.prevent="createPage">
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

      <button type="submit">Create</button>
    </form>
  </div>
</template>

  <script>
  export default {
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
  methods: {
    createPage() {
      const tags = this.tagsString.split(',').map(tag => tag.trim());
      this.$inertia.post('/pages', { ...this.$data, tags });
    }
  }
}
</script>
