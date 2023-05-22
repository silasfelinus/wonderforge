<template>
    <div
      class="bubble flex flex-col items-center justify-center relative overflow-hidden shadow-lg transform transition-transform duration-500 ease-in-out hover:scale-125 rounded-full"
      @mouseover="hover(index); generateRandomColor();"
      @mouseout="unhover"
    >
      <img v-if="imageUrl" :src="imageUrl" class="w-full h-full object-cover"/>
      <span class="mt-1">{{ gallery.name }}</span>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRandomColor } from "../Composables/useRandomColor"

const { generateRandomColor } = useRandomColor()

const props = defineProps({
  index: Number,
  gallery: Object,
})

const imageUrl = ref(null)

onMounted(async () => {
  if (props.gallery.folderName) {
    try {
      const response = await fetch(`/images/${props.gallery.folderName}/random`)
      const imageData = await response.json()
      imageUrl.value = imageData.image
    } catch (error) {
      console.error('Error fetching image:', error)
    }
  }
})

const hover = (index) => {
  emit('hover', index)
}

const unhover = () => {
  emit('unhover')
}

const emit = defineEmits(['hover', 'unhover'])
</script>

<style scoped>
.bubble {
  border-radius: 50%;
  width: 100px;
  height: 100px;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0% { transform: translatey(0px); }
  50% { transform: translatey(-20px); }
  100% { transform: translatey(0px); }
}
</style>
