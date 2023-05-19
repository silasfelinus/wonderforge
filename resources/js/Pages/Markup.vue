<template>
    <div v-for="line in markdownLines" :key="line" v-html="line"></div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import MarkdownIt from 'markdown-it';

  const props = defineProps({
    name: {
      type: String,
      default: 'DreamScenarios'
    }
  });

  const markdownLines = ref([]);
  const md = new MarkdownIt();

  onMounted(async () => {
    try {
      const response = await fetch(`/markdown/${props.name}`);
      if (!response.ok) {
        throw new Error("HTTP error " + response.status);
      }
      const text = await response.text();
      const lines = text.split('\n');
      markdownLines.value = lines.map(line => md.render(line));
    } catch (error) {
      console.error('Error loading markdown file:', error);
      markdownLines.value = ["Default text stops here"];
    }
  });
  </script>
