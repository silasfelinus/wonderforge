<template>
  <div
    class="butterfly"
    :style="{
      left: x + 'px',
      top: y + 'px',
      transform:
        'rotate3d(1, 0.5, 0, ' + rotation + 'deg) scale(' + scale + ')',
    }"
  >
    <div class="left-wing">
      <div class="top" :style="{ background: wingColor }"></div>
      <div class="bottom" :style="{ background: wingColor }"></div>
    </div>
    <div class="right-wing">
      <div class="top" :style="{ background: wingColor }"></div>
      <div class="bottom" :style="{ background: wingColor }"></div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import { useRandomColor } from "./../Composables/useRandomColor";
import { makeNoise2D } from "open-simplex-noise";

// Perlin noise setup
const noise2D = makeNoise2D(Date.now());
let t = 0;

const props = defineProps<{
  wingColor?: string;
  x?: number;
  y?: number;
}>();

const wingColor = props.wingColor || useRandomColor().randomColor.value;
const x = ref(props.x || 0);
const y = ref(props.y || 0);
const scale = ref(1);
const rotation = ref(110); // Initialize the rotation

const speed = ref(2);

function updatePosition() {
  t += 0.01;
  const angle = noise2D(x.value * 0.01, y.value * 0.01 + t) * Math.PI * 2;
  const dx = Math.cos(angle) * speed.value;
  const dy = Math.sin(angle) * speed.value;

  x.value += dx;
  y.value += dy;

  if (x.value < 0 || x.value > window.innerWidth - 100) {
    x.value = Math.max(Math.min(x.value, window.innerWidth - 100), 0);
  }

  if (y.value < 0 || y.value > window.innerHeight - 100) {
    y.value = Math.max(Math.min(y.value, window.innerHeight - 100), 0);
  }

  // Change scale based on another Perlin noise function
  scale.value = 0.5 + noise2D(x.value * 0.005, y.value * 0.005 + t) * 0.5;

  // Update the rotation based on the direction
  rotation.value = dx >= 0 ? 120 : 30;
}

function animate() {
  updatePosition();
  requestAnimationFrame(animate);
}

onMounted(() => {
  animate();
});
</script>

<style scoped>
body {
  background: #111;
}

@keyframes flutter-left {
  0% {
    transform: rotate3d(0, 1, 0, 20deg);
  }
  50% {
    transform: rotate3d(0, 1, 0, 70deg);
  }
  100% {
    transform: rotate3d(0, 1, 0, 20deg);
  }
}

@keyframes flutter-right {
  0% {
    transform: rotate3d(0, 1, 0, -20deg);
  }
  50% {
    transform: rotate3d(0, 1, 0, -70deg);
  }
  100% {
    transform: rotate3d(0, 1, 0, -20deg);
  }
}

.butterfly {
  width: 100px;
  height: 100px;
  position: absolute;
  transform-style: preserve-3d;
  transform: rotate3d(1, 0.5, 0, 110deg);
}

.left-wing,
.right-wing {
  width: 24px;
  height: 42px;
  position: absolute;
  top: 10px;
}

.left-wing {
  left: 10px;
  top: 10px;
  transform-origin: 24px 50%;
  transform: rotate3d(0, 1, 0, 20deg);
  animation: flutter-left 0.3s infinite;
}

.right-wing {
  left: 34px;
  transform: rotate3d(0, 1, 0, -20deg);
  transform-origin: 0px 50%;
  animation: flutter-right 0.3s infinite;
}

.left-wing .top {
  right: 0;
}

.top,
.bottom {
  opacity: 0.7;
  position: absolute;
}
.top {
  width: 20px;
  height: 20px;
  border-radius: 10px;
}

.bottom {
  top: 18px;
  width: 24px;
  height: 24px;
  border-radius: 12px;
}
</style>
