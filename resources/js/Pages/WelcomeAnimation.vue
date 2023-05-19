<template>
    <div id="welcome-animation">
      <Navigation />
      <div class="phrase-container">
        <h1 class="welcome">Welcome</h1>
        <h2 class="to-cafe-purr">to cafe purr</h2>
      </div>
      <WordDrops />
      <RandomImage />
      <div class="button-container">
        <Button label="Button 1" />
        <Button label="Button 2" />
      </div>
      <Pulser @updatePulseSpeed="handlePulseSpeedUpdate" />
    </div>
  </template>


  <script setup>
  import { ref, onMounted, watch } from 'vue';
  import { gsap } from "gsap";
  import Pulser from "./Pulser.vue";
  import Navigation from "./NavigationPage.vue";
import WordDrops from "./WordDrops.vue";
import Button from "./Button.vue";

  const pulseSpeed = ref(1);

  const handlePulseSpeedUpdate = (newPulseSpeed) => {
    pulseSpeed.value = newPulseSpeed;
  };

  let tl;
  onMounted(() => {
    tl = gsap.timeline({ repeat: -1, yoyo: true });
    tl.to('.welcome', { duration: pulseSpeed.value, scale: 1.1, ease: "power2.inOut" });
    tl.to('.to-cafe-purr', { duration: pulseSpeed.value, scale: 1.1, ease: "power2.inOut" }, "-=0.5");
  });

  watch(pulseSpeed, (newPulseSpeed) => {
    tl.clear();
    tl.to('.welcome', { duration: newPulseSpeed, scale: 1.1, ease: "power2.inOut" });
    tl.to('.to-cafe-purr', { duration: newPulseSpeed, scale: 1.1, ease: "power2.inOut" }, "-=0.5");
  });
  </script>

<style scoped>
#welcome-animation {
  font-family: 'Roboto', sans-serif;
  font-size: 4em;
  text-align: center;
  color: #FF6347;
  padding: 20px;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to right, #FF7E5F , #FEB47B);
  border: 5px solid #000;
  border-radius: 25px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.phrase-container {
  position: relative;
  z-index: 2;
}

.button-container {
  display: flex;
  justify-content: space-between;
  width: 50%;
  position: absolute;
  bottom: 20px;
}

.welcome, .to-cafe-purr {
  opacity: 1;
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

@media only screen and (max-width: 600px) {
  .welcome, .to-cafe-purr {
    font-size: 2em;
  }
}
</style>
