<template>
  <div class="flex-container">
    <div v-for="page in pages" :key="page.title" class="card">
      <h2>{{ page.title }}</h2>
      <p>{{ page.description }}</p>
      <nuxt-link v-if="page.link" :to="page.link">Go to page</nuxt-link>
      <div v-else>No Link Provided</div>
    </div>
    <div v-if="error">{{ error }}</div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const error = ref(null);
const pages = ref([]);

onMounted(async () => {
  try {
    const { $content } = useContext();
    const data = await $content('pages').fetch();

    if (data && data.pages) {
      pages.value = data.pages;
    } else {
      throw new Error('No pages found');
    }
  } catch (err) {
    error.value = err.message;
  }
});
</script>

<style scoped>
.flex-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.card {
  border: 1px solid #ccc;
  padding: 20px;
  margin: 10px;
  flex-basis: calc(33% - 20px);
}

@media (max-width: 800px) {
  .card {
    flex-basis: calc(50% - 20px);
  }
}

@media (max-width: 500px) {
  .card {
    flex-basis: 100%;
  }
}
</style>
