import { ref, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
  folderName: String,
});

const imageUrl = ref("");

onMounted(async () => {
  try {
    const response = await axios.get(`/images/${props.folderName}`);
    const imagesList = response.data;
    if (!imagesList || imagesList.length === 0) {
      throw new Error("No images found in the folder");
    }
    const randomIndex = Math.floor(Math.random() * imagesList.length);
    imageUrl.value = `/images/${props.folderName}/${imagesList[randomIndex]}`;
  } catch (error) {
    console.error("Error while fetching images:", error);
  }
});
