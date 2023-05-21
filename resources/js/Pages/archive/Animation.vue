<template>
    <div id="welcome-animation">
      <div class="phrase-container">
        <h1 class="title"><Wildcard name="title" /></h1>
        <h2 class="subtitle"><Wildcard name="subtitle" /></h2>
        <p class="quote" v-if="showQuote" :style="{ color: quoteColor }"><Wildcard name="quote" /></p>
      </div>
      <ButterflyGroup v-if="showButterflies" />
      <div class="word-network" v-html="markdownText"></div>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import { gsap } from "gsap";
  import { useRandomColor } from "./../../Composables/useRandomColor";
  import ButterflyGroup from "../ButterflyGroup.vue";
  import Wildcard from "../Wildcard.vue";
  import axios from 'axios';
  import MarkdownIt from 'markdown-it';

  const props = defineProps({
    name: String
  });

  const markdownText = ref("");
  const md = new MarkdownIt();
  const quoteColor = ref("");
  const showQuote = ref(false);
  const showButterflies = ref(false);

  const randomizeAnimation = () => {
    const animations = ["fadeIn", "slideIn", "popIn"];
    const speeds = [1, 2, 3];
    const sizes = [1, 1.5, 2];
    const directions = ["left", "right", "top", "bottom"];

    return {
      animation: animations[Math.floor(Math.random() * animations.length)],
      speed: speeds[Math.floor(Math.random() * speeds.length)],
      size: sizes[Math.floor(Math.random() * sizes.length)],
      direction: directions[Math.floor(Math.random() * directions.length)],
    };
  };

  onMounted(async () => {
    try {
      const response = await axios.get(`/markdown/${props.name}.md`);
      markdownText.value = md.render(response.data);
    } catch (error) {
      console.error('Error loading markdown file:', error);
      markdownText.value = "Default text stops here";
    }

    const tl = gsap.timeline({ onComplete: () => showButterflies.value = true });
    const elements = ["title", "subtitle", "quote"];
    elements.forEach((element, index) => {
      const { animation, speed, size, direction } = randomizeAnimation();
      tl.to(`.${element}`, {
        duration: speed,
        text: `<Wildcard name="${element}" />`,
        ease: "power2.inOut",
        delay: index * 2,
        onStart: () => {
          if (element === "quote") {
            quoteColor.value = useRandomColor();
            showQuote.value = true;
          }
        }
      });
      tl.to('.phrase-container', { duration: 2, top: '0', left: '0', position: 'absolute', ease: "power2.inOut" });
      tl.to('.word-network', { [animation]: true, repeat: -1, ease: "power1.inOut", [direction]: '100px', scale: size });
    });
  });
  </script>

  <style scoped>
  /* ... existing styles ... */

  /* add new animation styles */
  @keyframes slideIn {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
  }

  @keyframes popIn {
    0% { transform: scale(0); opacity: 0; }
    50% { transform: scale(1.1); opacity: 0.5; }
    100% { transform: scale(1); opacity: 1; }
  }
  </style>
