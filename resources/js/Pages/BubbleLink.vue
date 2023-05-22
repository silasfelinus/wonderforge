<template>
    <div
      class="bubble-container flex flex-col items-center justify-center relative overflow-visible shadow-lg transition-transform duration-500 ease-in-out"
      @mouseover="hover(index); generateRandomColor();"
      @mouseout="unhover"
    >
        <div class="bubble w-24 h-24 rounded-full overflow-hidden absolute">
            <img v-if="imageUrl" :src="imageUrl" class="w-full h-full object-cover"/>
            <span class="bubble-label">{{ gallery.name }}</span>
        </div>
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
.bubble-container {
  animation: float 12s ease-in-out infinite;
}

.bubble:hover {
  transform: scale(1.2);
}

.bubble-label {
  position: absolute;
  top: 10px; /* Adjust this value to position the label */
  width: 100%;
  text-align: center;
  font-size: 0.8rem; /* Adjust the font size as needed */
  color: #fff;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 50%; /* This gives the label a curved background */
  padding: 5px 0; /* Padding to give the label some room */
}
</style>
