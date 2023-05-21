<template>
    <div
      class="butterfly"
      :style="{
        left: x + 'px',
        top: y + 'px',
        transform:
          'rotate3d(1, 0.5, 0, ' + rotation + 'deg) scale(' + scale + ')',
      }"
      @click="handleClick"
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
import { onMounted, ref, onUnmounted } from "vue";
import { useRandomColor } from "./../Composables/useRandomColor";
import { makeNoise2D } from "open-simplex-noise";

const noise2D = makeNoise2D(Date.now());
let t = 0;

const props = defineProps<{
  wingColor?: string;
  x?: number;
  y?: number;
}>();

const wingColor = props.wingColor || useRandomColor().randomColor.value;
const x = ref(props.x || Math.random() * window.innerWidth);
const y = ref(props.y || Math.random() * window.innerHeight);
const scale = ref(1);
const rotation = ref(110);

const speed = ref(2);
const dx = ref(0);
const dy = ref(0);

function handleClick() {
    speed.value *= -1;
  }

  function updatePosition() {
    t += 0.01;
    const angle = noise2D(x.value * 0.01, y.value * 0.01 + t) * Math.PI * 2;
    dx.value = Math.cos(angle) * speed.value;
    dy.value = Math.sin(angle) * speed.value;

    x.value += dx.value;
    y.value += dy.value;

    if (x.value < 0 || x.value > window.innerWidth - 100) {
      x.value = Math.max(Math.min(x.value, window.innerWidth - 100), 0);
    }

    if (y.value < 0 || y.value > window.innerHeight - 100) {
      y.value = Math.max(Math.min(y.value, window.innerHeight - 100), 0);
    }

    // Change scale based on screen position
    scale.value = 0.33 + (2 - (x.value / window.innerWidth + y.value / window.innerHeight)) / 2 * 0.67;

    // Update the rotation based on the direction
    rotation.value = dx.value >= 0 ? 120 : 30;
  }

  function animate() {
    updatePosition();
    requestAnimationFrame(animate);
  }

  const handleMouseMove = (e) => {
    const dxMouse = e.clientX - x.value;
    const dyMouse = e.clientY - y.value;
    const distance = Math.sqrt(dxMouse * dxMouse + dyMouse * dyMouse);

    if (distance < 150) {
      const directionX = dxMouse / distance;
      const directionY = dyMouse / distance;
      dx.value -= directionX * 2;
      dy.value -= directionY * 2;

      // Limit speed
      const speed = Math.sqrt(dx.value * dx.value + dy.value * dy.value);
      if (speed > 5) {
        dx.value = dx.value / speed * 5;
        dy.value = dy.value / speed * 5;
      }

      rotation.value = dx.value >= 0 ? 120 : 30;
    }
  };


onMounted(() => {
  document.addEventListener("mousemove", handleMouseMove);
  animate();
});

onUnmounted(() => {
  document.removeEventListener('mousemove', handleMouseMove);
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
