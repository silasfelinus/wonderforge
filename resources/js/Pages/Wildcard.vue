<template>
    <div class="fixed top-14 left-2 rounded-full px-4 py-2 transition-opacity duration-700 ease-in-out" :style="{ 'color': randomColor.value, 'opacity': opacity }">
      <p class="text-xl font-bold" v-html="newWord"></p>
    </div>
  </template>

  <script setup>
    import { ref, onMounted } from 'vue';
    import MarkdownIt from 'markdown-it';
    import { useRandomColor } from '../Composables/useRandomColor';

    const props = defineProps({
      name: {
        type: String,
        default: 'DreamScenarios'
      }
    });

    const emit = defineEmits(['newWord']);

    const markdownLines = ref([]);
    const newWord = ref('');
    const md = new MarkdownIt();
    const opacity = ref(1);

    // Use random color composable
    const { randomColor, generateRandomColor } = useRandomColor();

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
      const word = md.render(markdownLines.value[randomIndex]);
      opacity.value = 0;
      setTimeout(() => {
        newWord.value = word;
        generateRandomColor(); // Generate new random color
        opacity.value = 1;
        emit('newWord', word);
      }, 700);
    };

    // Emits a new word randomly every 5-15 seconds
    setInterval(emitNewWord, Math.random() * 10000 + 5000);
  </script>

  <style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

    div {
      font-family: 'Roboto', sans-serif;
    }
  </style>
