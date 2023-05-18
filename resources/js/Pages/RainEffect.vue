<template>
  <div class="weather-container">
    <div
      v-for="(_, index) in numberOfDrops"
      :key="index"
      class="rain-drop"
      :style="{
        left: randomXPosition() + 'px',
        top: randomYPosition() + 'px',
        animationDuration: calculateDuration(randomSize()) + 's',
        animationDelay: randomDelay() + 's',
        width: randomSize() + 'px',
        height: randomSize() * 5 + 'px',
        transform: initialTransform(),
      }"
    >
      <div
        class="splash"
        :style="{ animationDelay: calculateDuration(randomSize()) + 's' }"
      ></div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from "vue";

export default defineComponent({
  props: {
    intensity: {
      type: Number as PropType<number>,
      default: 2,
    },
    numberOfDrops: {
      type: Number as PropType<number>,
      default: 100,
    },
    windAngle: {
      type: Number as PropType<number>,
      default: 0,
    },
  },
  mounted() {
    document.documentElement.style.setProperty(
      "--wind-angle",
      `${this.windAngle}deg`
    );
  },
  methods: {
    randomXPosition(): number {
      return Math.floor(Math.random() * window.innerWidth);
    },
    randomYPosition(): number {
      // Ensures the rain always starts above the display
      return Math.floor(Math.random() * -window.innerHeight);
    },
    calculateDuration(size: number): number {
      const duration =
        (window.innerHeight / (50 * this.intensity)) * (size / 2);
      return duration;
    },
    randomDelay(): number {
      return Math.random() * 2;
    },
    randomSize(): number {
      return 1 + Math.random() * 3;
    },
    randomWindAngle(): number {
      // Generate a random wind angle between -10 and 10 degrees
      return this.windAngle + Math.floor(Math.random() * 21) - 10;
    },
    initialTransform(): string {
      // Use the random wind angle when initializing the raindrop position
      const randomAngle = this.randomWindAngle();
      document.documentElement.style.setProperty(
        "--wind-angle",
        `${randomAngle}deg`
      );
      return `translateY(-100%) rotate(${randomAngle}deg)`;
    },
    fallAnimationName(): string {
      return `fall-${this.windAngle}`;
    },
  },
});
</script>
<!-- The weather-container class sets the size and position of the animation container. -->
<!-- The rain-drop class defines the appearance, animation, and properties of individual raindrops. -->
<!-- The fall keyframes animation is responsible for the falling motion and rotation of the raindrops. -->
<style lang="scss">
.weather-container {
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: $dark; /* Added for transparent background */
}
.rain-drop {
  position: absolute;
  background-color: #00b0ff;
  opacity: 0.5;
  border-radius: 40% 40% 50% 50%;
  animation: fall linear infinite forwards;
  will-change: transform;
}
.splash {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 3px;
  height: 3px;
  background-color: #00b0ff;
  opacity: 0;
  border-radius: 50%;
  animation: splash linear 0.5s forwards;
}
@keyframes fall {
  0% {
    transform: translateY(-100%) rotate(var(--wind-angle, 0deg));
  }
  100% {
    transform: translateY(calc(100% + 100vh))
      rotate(calc(var(--wind-angle, 0deg) * 2));
  }
}
@keyframes splash {
  0% {
    opacity: 0.5;
    width: 0;
    height: 0;
    border-radius: 50%;
  }
  50% {
    opacity: 0.5;
    width: 20px;
    height: 5px;
    border-radius: 20% 20% 80% 80%;
  }
  100% {
    opacity: 0;
    width: 40px;
    height: 10px;
    border-radius: 40% 40% 60% 60%;
  }
}
</style>
