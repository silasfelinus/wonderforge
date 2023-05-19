<template>
    <div v-html="markdownText"></div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import MarkdownIt from 'markdown-it';

const props = defineProps({
  name: String
});

const markdownText = ref("");
const md = new MarkdownIt();

onMounted(async () => {
  try {
    const response = await axios.get(`/markdown/${props.name}.md`);
    markdownText.value = md.render(response.data);
  } catch (error) {
    console.error('Error loading markdown file:', error);
    markdownText.value = "Default text stops here";
  }
});
</script>
