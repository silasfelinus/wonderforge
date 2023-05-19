<!-- LavaBubble.vue -->
<template>
  <circle
    :cx="bubble.x"
    :cy="bubble.y"
    :r="bubble.size"
    :fill="`hsla(${bubble.hue}, 100%, 50%, 0.8)`"
  />
</template>

<script>
export default {
  props: {
    bubble: {
      type: Object,
      required: true,
    },
  },
};
</script>
