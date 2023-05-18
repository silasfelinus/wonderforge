<template>
  <div class="container">
    <h1>Accordion Gallery</h1>
    <div class="gallery-wrap">
      <a
        v-for="(image, index) in images"
        :key="index"
        class="item"
        @click="toggleAccordion(index)"
        :style="{ backgroundImage: 'url(' + image.background + ')' }"
      >
        <SplashImage :folderName="image.folder" />
        <h2>{{ image.caption }}</h2>
      </a>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import SplashImage from "./SplashImage.vue";

interface Image {
  background: string;
  folder: string;
  caption: string;
}

export default defineComponent({
  components: {
    SplashImage,
  },
  props: {
    images: {
      type: Array as () => Image[],
      default: () => [],
    },
  },
  setup() {
    const toggleAccordion = (index: number) => {
      console.log("Toggle accordion item", index);
    };

    return { toggleAccordion };
  },
});
</script>

<style scoped>
.container {
  padding: 75px 0;
  margin: 0 auto;
  width: 1140px;
}

h1 {
  position: relative;
  margin-bottom: 45px;
  font-family: "Oswald", sans-serif;
  font-size: 44px;
  text-transform: uppercase;
  color: #424242;
}

.gallery-wrap {
  display: flex;
  flex-direction: row;
  width: 100%;
  height: 70vh;
}

.item {
  flex: 1;
  height: 100%;
  background-position: center;
  background-size: cover;
  background-repeat: none;
  transition: flex 0.8s ease;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  color: white;
  font-size: 24px;
  font-family: "Oswald", sans-serif;
  text-transform: uppercase;
}

.item:hover {
  flex: 7;
}

h2 {
  margin: 0;
}
</style>
