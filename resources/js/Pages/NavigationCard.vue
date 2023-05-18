<template>
  <div class="card" :class="{ 'under-development': underDevelopment }">
    <img :src="imageSrc" :alt="title" class="card-image" v-if="imageSrc" />
    <div v-else>Loading...</div>
    <div class="card-content">
      <h2 class="card-title">{{ title }}</h2>
      <p class="card-description">{{ description }}</p>
      <nuxt-link v-if="link && !underDevelopment" :to="link" class="card-link">Explore</nuxt-link>
      <p v-else class="under-development-text">Under Development</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
  title: String,
  description: String,
  link: String,
  image: String,
  gallery: String,
  underDevelopment: Boolean
});

let imageSrc = ref('');

onMounted(() => {
  if (props.gallery) {
    imageSrc.value = `/assets/galleries/${props.gallery}/${props.image}`;
  } else {
    console.error("There was an error loading the image: Gallery not specified");
  }
});
</script>

<style scoped>
.card {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 20px;
  margin-bottom: 20px;
  transition: box-shadow .3s;
}
.card:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
.card.under-development {
  background-color: #f9f9f9;
}
.card-image {
  width: 100%;
  height: auto;
}
.card-title {
  font-size: 1.25em;
  margin-bottom: 10px;
}
.card-description {
  margin-bottom: 20px;
}
.card-link {
  color: blue;
  text-decoration: none;
}
.under-development-text {
  color: red;
}
</style>
