<template>
    <div id="welcome-animation">
      <div class="phrase-container">
        <h1 class="title" :style="{ color: titleColor, fontFamily: font }">Cafe Purr</h1>
          <p class="quote" v-if="showQuote" :style="{ color: quoteColor, fontFamily: font }">
            Welcoming the future with vision and {{ currentEndWord }}.
          </p>
      <transition name="slide-fade">
  <RainEffect v-if="showRainEffect" />
</transition>
<transition name="slide-fade">
  <SoapBubbles v-if="showSoapBubbles" />
</transition>
<transition name="slide-fade">
  <LavaLamp v-if="showLavaLamp" />
</transition>
        <ButterflyGroup v-if="showButterflies" />
      </div>
    </div>
</template>

<script setup>
  import { ref, onMounted, nextTick } from 'vue';
  import ButterflyGroup from "./ButterflyGroup.vue";
  import { useRandomColor } from "../Composables/useRandomColor";
  import RainEffect from "./WordDrops.vue";
import SoapBubbles from "./Animations/SoapBubbles.vue";
import LavaLamp from "./Animations/LavaLamp.vue";

  const showRainEffect = ref(false);
const showSoapBubbles = ref(false);
const showLavaLamp = ref(false);
const font = ref('Roboto');

onMounted(() => {
  setTimeout(() => {
    showRainEffect.value = true;
    showSoapBubbles.value = true;
    showLavaLamp.value = true;
  }, 5000);

  setTimeout(() => {
    showRainEffect.value = false;
    showSoapBubbles.value = false;
    showLavaLamp.value = false;
  }, 10000);
});

  const locations = ['North Coast', 'California', 'Humboldt County']
  const generations = ['Next-Generation', 'Community', 'ChatGPT', 'Stable-Diffusion', 'Midjourney']
  const labs = ['Art Design Lab', 'Foster Cat Rescue', 'Anti-Malaria Fundraiser', 'Post-Modern Salon', 'Anarchistic Tech Disruption', 'Non-Evil Art Museum']
  const endWords = ['love', 'hope', 'intention', 'design', 'grace']

  let currentLocation = ref(locations[0])
  let currentGeneration = ref(generations[0])
  let currentLab = ref(labs[0])
  let currentEndWord = ref(endWords[0])

  let titleColor = useRandomColor().randomColor;
  let phraseColor = useRandomColor().randomColor;
  let quoteColor = useRandomColor().randomColor;
  const showQuote = ref(false);
  const showButterflies = ref(false);

  const changeText = (ref, array, delay) => {
    let index = 0;
    setInterval(() => {
      index = (index + 1) % array.length;
      ref.value = array[index];
    }, delay);
  };

  onMounted(() => {
    changeText(currentLocation, locations, 500);
    changeText(currentGeneration, generations, 700);
    changeText(currentLab, labs, 900);
    changeText(currentEndWord, endWords, 1100);

    setTimeout(() => {
      showQuote.value = true;
      showButterflies.value = true;
    }, 5000);
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
  background: linear-gradient(to right, #ff9966, #ff5e62); /* Consider changing these colors to something more 60s-inspired */
}

.title {
  font-size: 3em;
  opacity: 0;
  animation: slideInFromLeft 4s forwards;
}

.phrase {
  opacity: 0;
  animation: slideInFromRight 4s forwards;
}

.quote {
  font-size: 1.2em;
  color: #666;
  opacity: 0;
  animation: fadeIn 2s forwards;
}


  @keyframes slideInFromLeft {
    0% {
      opacity: 0;
      transform: translateX(-100%);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }

  @keyframes slideInFromRight {
    0% {
      opacity: 0;
      transform: translateX(100%);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }
  .slide-fade-enter-active {
  animation: slide-fade-in 2s;
}
.slide-fade-leave-active {
  animation: slide-fade-out 2s;
}
@keyframes slide-fade-in {
  0% {
    transform: translateX(-100%);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 0.6;
  }
}
@keyframes slide-fade-out {
  0% {
    transform: translateX(0);
    opacity: 0.6;
  }
  100% {
    transform: translateX(100%);
    opacity: 0;
  }
}
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }

  @media only screen and (max-width: 600px) {
    .title, .phrase, .quote {
      font-size: 1em;
    }
  }
  .list-item {
  position: absolute;
  width: 100%;
  transition: transform 0.5s ease-in-out;
  background: url('flower-pattern.png'); /* This is a hypothetical 60s flower pattern */
}

.list-move {
  transform: translateY(100%);
}

.list-leave-to {
  transform: translateY(-100%);
  position: absolute;
}
</style>
