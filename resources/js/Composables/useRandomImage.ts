import { ref, onMounted } from 'vue';
import axios from 'axios';

export function useRandomImage(folderName) {
  const imageUrl = ref("");

  onMounted(async () => {
    try {
      const response = await axios.get(`/images/${folderName}`);
      const imagesList = response.data;
      if (!imagesList || imagesList.length === 0) {
        throw new Error("No images found in the folder");
      }
      const randomIndex = Math.floor(Math.random() * imagesList.length);
      imageUrl.value = `/images/${folderName}/${imagesList[randomIndex]}`;
    } catch (error) {
      console.error("Error while fetching images:", error);
    }
  });

  return {
    imageUrl,
  };
}
