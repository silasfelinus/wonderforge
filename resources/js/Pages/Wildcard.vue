<template>
    <!-- No visual elements, this component only emits events -->
  </template>

  <script setup>
  import { ref, onMounted} from 'vue';
  import MarkdownIt from 'markdown-it';

  const props = defineProps({
    name: {
      type: String,
      default: 'DreamScenarios'
    }
  });

  const emit = defineEmits(['newWord']);

  const markdownLines = ref([]);
  const md = new MarkdownIt();

  onMounted(async () => {
    try {
      const response = await fetch(`/markdown/${props.name}`);
      if (!response.ok) {
        throw new Error("HTTP error " + response.status);
      }
      const text = await response.text();
      markdownLines.value = text.split('\n');
      emitNewWord();
    } catch (error) {
      console.error('Error loading markdown file:', error);
    }
  });

  const emitNewWord = () => {
    if (markdownLines.value.length === 0) {
      return;
    }
    const randomIndex = Math.floor(Math.random() * markdownLines.value.length);
    const newWord = md.render(markdownLines.value[randomIndex]);
    emit('newWord', newWord);
  };

  // Emits a new word every second
  setInterval(emitNewWord, 1000);
  </script>
