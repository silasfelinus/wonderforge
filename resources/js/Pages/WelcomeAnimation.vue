<template>
  <div id="welcome-animation">
    <div class="phrase-container">
      <span class="phrase-part">{{ phrasePart1 }}</span>
      <span class="phrase-part">{{ currentWord }}</span>
      <span class="phrase-part">{{ phrasePart2 }}</span>
    </div>
    <ButterflyGroup v-if="showButterflies" />
  </div>
</template>

<script>
import { gsap } from "gsap";
import ButterflyGroup from "./ButterflyGroup.vue";

export default {
  components: {
    ButterflyGroup,
  },
  data() {
    return {
      phrasePart1: "Welcoming the future, with vision and ",
      phrasePart2: ".",
      words: ["grace", "humor", "love", "levity", "hope"],
      currentWord: "grace",
      showButterflies: false,
    };
  },
  mounted() {
    this.animateWords();
  },
  methods: {
    animateWords() {
      const tl = gsap.timeline({ repeat: this.words.length - 1, onComplete: this.showButterflyGroup });
      this.words.forEach((word, index) => {
        tl.to(this.$data, {
          duration: 2,
          currentWord: word,
          ease: "power2.inOut",
          delay: index * 2
        });
      });
    },
    showButterflyGroup() {
      this.showButterflies = true;
    },
  },
};
</script>

<style scoped>
#welcome-animation {
  font-size: 2em;
  text-align: center;
  color: #333;
}

.phrase-part {
  display: inline-block;
}
</style>
