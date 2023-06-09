<template>
    <div id="welcome-animation">
      <div class="phrase-container">
        <h1 class="title" :style="{ color: titleColor, fontFamily: font }">Cafe Purr</h1>
        <transition-group name="list" tag="p" class="phrase" :style="{ color: phraseColor, fontFamily: font }">
          <span :key="currentLocation" class="list-item">{{ currentLocation }}</span>
          <span class="list-item">'s</span>
          <span :key="currentGeneration" class="list-item">{{ currentGeneration }}</span>
          <span :key="currentLab" class="list-item">{{ currentLab }}</span>
        </transition-group>
        <transition-group name="identity" tag="p" class="identity" :style="{ color: identityColor, fontFamily: font }">
          <span :key="currentIdentity" class="list-item">{{ currentIdentity }}</span>
        </transition-group>
        <Card>
          <p class="quote" v-if="showQuote" :style="{ color: quoteColor, fontFamily: font }">
            "Welcoming the future with vision and {{ currentEndWord }}."
          </p>
        </Card>
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
        <ChatWindow />
      </div>
    </div>
</template>

<script setup>
  import { Head, Link } from "@inertiajs/vue3";
  import CardComponent from "./CardComponent.vue";
  import ButterflyGroup from "./ButterflyGroup.vue";
  import Wildcard from "./Wildcard.vue";
  import Title from "./TitleAnimation.vue";
  import ButtonPulse from "./Button2.vue";
  import WordDrops from "./WordDrops.vue";
  import ChatWindow from "./ChatWindow.vue";

  defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  });

  const showRainEffect = ref(false);
  const showSoapBubbles = ref(false);
  const showLavaLamp = ref(false);

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

  const identity = [`Made in Humboldt County`]
  const endWords = ['love', 'hope', 'intention', 'design', 'grace']

  let currentLocation = ref(locations[0])
  let currentGeneration = ref(generations[0])
  let currentLab = ref(labs[0])
  let currentEndWord = ref(endWords[0])
  let currentIdentity = ref(identity[0])

  let titleColor = useRandomColor().randomColor;
  letphraseColor = useRandomColor().randomColor;
  let quoteColor = useRandomColor().randomColor;
  let identityColor = useRandomColor().randomColor;
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
    changeText(currentIdentity, identity, 1300);

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
  font-family: 'Groovy', sans-serif; /* This is a hypothetical 60s-inspired font */
}

.phrase {
  opacity: 0;
  animation: slideInFromRight 4s forwards;
  font-family: 'Groovy', sans-serif; /* This is a hypothetical 60s-inspired font */
}

.quote {
  font-size: 1.2em;
  color: #666;
  opacity: 0;
  animation: fadeIn 2s forwards;
  font-family: 'Groovy', sans-serif; /* This is a hypothetical 60s-inspired font */
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
}

.list-move {
  transform: translateY(100%);
}

.list-leave-to {
  transform: translateY(-100%);
  position: absolute;
}
</style>
