<template>
  <div class="image-container">
    <img v-if="randomImageUrl" :src="randomImageUrl" alt="Random Image" />
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted, watch } from "vue";

export default defineComponent({
  props: {
    folderName: {
      type: String,
      default: "splash",
    },
  },
  setup(props) {
    const randomImageUrl = ref<string | null>(null);
    let imagesList: string[] = [];

    const serverAddress = "https://localhost:3000";

    const getRandomImageUrl = () => {
      if (imagesList.length === 0) {
        console.error("No images found in the folder");
        return;
      }
      const randomIndex = Math.floor(Math.random() * imagesList.length);
      randomImageUrl.value = `${serverAddress}/assets/images/${props.folderName}/${imagesList[randomIndex]}`;
    };

    const loadImages = async () => {
      try {
        console.log(
          `Fetching images from: ${serverAddress}/images?folderName=${props.folderName}`
        );
        const response = await fetch(
          `${serverAddress}/images?folderName=${props.folderName}`
        );
        if (!response.ok) {
          console.error(await response.text());
          return;
        }

        imagesList = await response.json();
        getRandomImageUrl();
      } catch (error) {
        console.error("Error while fetching images:", error);
      }
    };

    onMounted(() => {
      loadImages();
    });

    watch(
      () => props.folderName,
      () => {
        loadImages();
      }
    );

    return { randomImageUrl, getRandomImageUrl };
  },
});
</script>

<style scoped>
.image-container {
  height: 100%;
  overflow: hidden;
  position: relative;
}
</style>
