<template>
    <div id="welcome-animation">
      <div class="phrase-container">
        <h1 class="title"><Wildcard name="title" /></h1>
        <h2 class="subtitle"><Wildcard name="subtitle" /></h2>
        <p class="quote" v-if="showQuote" :style="{ color: quoteColor }"><Wildcard name="quote" /></p>
      </div>
      <ButterflyGroup v-if="showButterflies" />
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import { gsap } from "gsap";
  import { useRandomColor } from "../Composables/useRandomColor";
  import ButterflyGroup from "./ButterflyGroup.vue";
  import Wildcard from "./Wildcard.vue";

  const quoteColor = ref("");
  const showQuote = ref(false);
  const showButterflies = ref(false);

  onMounted(() => {
    const tl = gsap.timeline({ onComplete: () => showButterflies.value = true });
    const elements = ["title", "subtitle", "quote"];
    elements.forEach((element, index) => {
      tl.to(`.${element}`, {
        duration: 2,
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
    });
    tl.to('.phrase-container', { duration: 2, top: '0', left: '0', position: 'absolute', ease: "power2.inOut" });
  });
  </script>

  <style scoped>
  #welcome-animation {
    font-size: 2em;
    text-align: center;
    color:#333;
    padding: 20px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: grey;
  }

  .title, .subtitle {
    opacity: 0;
    animation: fadeInOut 4s infinite;
  }

  .quote {
    font-size: 1.2em;
    color: #666;
    opacity: 0;
    animation: fadeIn 2s forwards;
  }

  @keyframes fadeInOut {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
  }

  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @media only screen and (max-width: 600px) {
    .title {
      font-size: 1.5em;
    }
    .subtitle, .quote {
      font-size: 1em;
    }
  }
  </style>
