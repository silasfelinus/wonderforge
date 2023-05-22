<template>
    <div>
      <img :src="src" :alt="title" />
      <button @click="$emit('art')">Art</button>
      <button @click="$emit('not-art')">Not Art</button>
    </div>
  </template>

  <script setup>
  const props = defineProps({
    src: String,
    title: String
  });
  </script>
