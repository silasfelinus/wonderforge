<template>
  <div class="artistic-message">
    {{ message }}
  </div>
</template>
<script lang="ts">
import { defineComponent, ref } from "vue";

export default defineComponent({
  name: "ArtisticMessage",
  setup() {
    const messages = [
      "Dive into the ocean of creativity!",
      "Your canvas, your rules!",
      "Art is the language of the soul!",
      "Let your imagination take the wheel!",
      "Unleash the artist within you!",
      "Colors speak louder than words!",
      "Create your masterpiece!",
      "Digital art never felt so magical!",
      "Let's paint the world together!",
      "Creativity knows no bounds!",
      "No brush, no problem!",
      "Ready to create your next digital masterpiece?",
      "Pixels and passion, all in one place!",
      "Capture the essence of your imagination!",
      "Artistic freedom at your fingertips!",
      "Embrace the power of digital art!",
      "Paint the town with your digital brush!",
      "Create, explore, and inspire!",
      "Unveil the artist within!",
      "Dream big and create even bigger!",
    ];

    const randomIndex = Math.floor(Math.random() * messages.length);
    const message = ref(messages[randomIndex]);

    return {
      message,
    };
  },
});
</script>
