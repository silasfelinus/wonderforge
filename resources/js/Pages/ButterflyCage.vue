<template>
  <div class="butterfly-cage" @click="onAlert">
    <ButterflyGroup @alert="onAlert" />
    <div class="message-container">
      <p class="glass-message">Thank you for stopping by! This is very much a work in progress, if you want to help, you can make a donation to AMI's campaign to purchase mosquito nets.</p>
      <nuxt-link class="donation-link" to="http://againstmalaria.org/amibot">Donate Now</nuxt-link>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from "vue";

const isAlerted = ref(false);

const onAlert = () => {
  isAlerted.value = true;
  setTimeout(() => {
    isAlerted.value = false;
  }, 500);
};
</script>

<style scoped>
.butterfly-cage {
  position: relative;
  width: 70%;
  height: 50%;
  margin: 10px auto;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.1);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.message-container {
  z-index: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1em;
  padding: 1em;
  background: rgba(0, 0, 0, 0.7);
  color: #fff;
  border-radius: 10px;
}

.glass-message {
  text-align: center;
  font-weight: bold;
}

.donation-link {
  background: #f44336;
  color: #fff;
  padding: 0.5em 1em;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.2s ease;
}

.donation-link:hover {
  background: #ff5722;
}
</style>
