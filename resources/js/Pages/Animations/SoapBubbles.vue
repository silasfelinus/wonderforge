<template>
  <div class="soap-bubbles">
    <svg
      v-for="(bubble, index) in bubbles"
      :key="index"
      class="bubble"
      :style="bubbleStyle(bubble)"
      @click="popBubble(index)"
    >
      <circle
        :cx="bubble.size / 2"
        :cy="bubble.size / 2"
        :r="bubble.size / 2"
        :fill="`hsla(${bubble.hue}, 100%, 50%, 0.2)`"
        :stroke="`hsla(${bubble.hue}, 100%, 50%, 0.5)`"
        stroke-width="2"
      ></circle>
    </svg>
  </div>
</template>

<script>
export default {
  data() {
    return {
      bubbles: [],
      bubbleCreationInterval: null,
    };
  },
  methods: {
    createBubble() {
      const size = Math.random() * 15 + 3;
      const x = Math.random() * (100 - size);
      const y = 0;
      const duration = Math.random() * 6 + 4;
      const hue = Math.floor(Math.random() * 360);

      this.bubbles.push({ x, y, size, duration, hue });
    },
    popBubble(index) {
      this.bubbles.splice(index, 1);
    },
    bubbleStyle(bubble) {
      return {
        left: `${bubble.x}vw`,
        bottom: `${bubble.y}vh`,
        width: `${bubble.size}vw`,
        height: `${bubble.size}vw`,
        animationDuration: `${bubble.duration}s`,
      };
    },
  },
  mounted() {
    this.bubbleCreationInterval = setInterval(this.createBubble, 1000);
  },
  beforeUnmount() {
    clearInterval(this.bubbleCreationInterval);
  },
};
</script>

<style scoped>
.soap-bubbles {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.bubble {
  position: absolute;
  pointer-events: auto;
  animation: floatBubbles linear infinite;
}

@keyframes floatBubbles {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-100vh);
  }
}
</style>
