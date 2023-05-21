<template>
    <div id="welcome-animation">
      <div class="phrase-container">
        <h1 class="title">{{ title }}</h1>
        <h2 class="subtitle">{{ subtitle }}</h2>
        <p class="quote" v-if="showQuote" :style="{ color: quoteColor }">{{ quote }}</p>
      </div>
      <ButterflyGroup v-if="showButterflies" />
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { gsap } from "gsap";
import { useRandomColor } from "./../../Composables/useRandomColor";
import ButterflyGroup from "../ButterflyGroup.vue";

const title = ref("Cafe Purr");
const subtitle = ref("Next generation digital art gallery");
const quote = ref("Welcoming the future, with vision and grace...");
const quoteColor = ref("");
const showQuote = ref(false);
const showButterflies = ref(false);

const titles = ["Cafe Purr", "Humboldt County's own next-generation digital art gallery"];
const subtitles = ["Next generation digital art gallery", "North-coast's own next-generation digital art gallery", "Humboldt County's own..."];
const quotes = ["Welcoming the future, with vision and grace...", "Welcoming the future, with vision and humor...", "Welcoming the future, with vision and love...", "Welcoming the future, with vision and levity...", "Welcoming the future, with vision and hope..."];

onMounted(() => {
  const tl = gsap.timeline({ onComplete: () => showButterflies.value = true });
  titles.forEach((t, index) => {
    tl.to(title, {
      duration: 2,
      text: t,
      ease: "power2.inOut",
      delay: index * 2
    })
    .to(subtitle, {
      duration: 2,
      text: subtitles[index],
      ease: "power2.inOut",
      delay: index * 2
    })
    .to(quote, {
      duration: 2,
      text: quotes[index],
      ease: "power2.inOut",
      delay: index * 2,
      onStart: () => {
        quoteColor.value = useRandomColor();
        showQuote.value = true;
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
