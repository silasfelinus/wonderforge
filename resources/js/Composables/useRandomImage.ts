// useRandomImage.js
import { ref, onMounted } from 'vue';

export default function useRandomImage() {
  const randomImage = ref('home1.png');

  return { randomImage };
}
