<template>
    <div>
      <h1>Count: {{ count }}</h1>
      <button @click="increment">Increment</button>
      <button @click="decrement">Decrement</button>
      <p v-if="isPositive">The count is positive.</p>
      <p v-else>The count is not positive.</p>
    </div>
  </template>

  <script setup>
  import { useDemoStore } from '../stores/useDemoStore';

  const demoStore = useDemoStore();

  // Expose everything we need in the template
  const count = demoStore.count;
  const increment = demoStore.increment;
  const decrement = demoStore.decrement;
  const isPositive = demoStore.isPositive;
  </script>
