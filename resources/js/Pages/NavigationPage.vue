<template>
    <footer class="fixed bottom-0 w-full h-auto bg-gray-900 transform transition-transform duration-500 ease-in-out overflow-y-auto"
            :class="{
                'h-6': isCollapsed,
                'h-1/3': isPartiallyExtended,
                'h-full': isFullyExtended
            }">
        <div class="h-6 bg-white flex items-center justify-center cursor-pointer" @click="toggleDrawer">
            <span class="text-black">{{ drawerStateText }}</span>
        </div>
        <div v-if="!isCollapsed" class="grid grid-cols-4 gap-4 p-4 bg-white rounded-t shadow">
            <div v-for="(gallery, index) in galleries" v-if="index < 4" :key="index" class="rounded shadow p-4">
        <Link @click="navigateTo(gallery, index)" :href="gallery.path" :style="{backgroundColor: randomColor}" class="bubble flex items-center justify-center relative overflow-hidden shadow-lg transform transition-transform duration-500 ease-in-out hover:scale-125" @mouseover="hover(index); generateRandomColor();" @mouseout="unhover">
            <img v-if="gallery.image" :src="gallery.image" class="w-full h-full object-cover"/>
            <span>{{ gallery.name }}</span>
        </Link>
    </div>
        </div>
        <div v-if="isFullyExtended" class="flex flex-wrap justify-around p-4">
            <div v-for="(gallery, index) in galleries" v-if="index >= 4" :key="index" class="rounded shadow p-4 m-2">
                <Link @click="navigateTo(gallery, index)" :href="gallery.path" :style="{backgroundColor: randomColor}" class="bubble flex items-center justify-center relative overflow-hidden shadow-lg transform transition-transform duration-500 ease-in-out hover:scale-125" @mouseover="hover(index); generateRandomColor();" @mouseout="unhover">
                    <img v-if="gallery.image" :src="gallery.image" class="w-full h-full object-cover"/>
                    <span>{{ gallery.name }}</span>
                </Link>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { ref, reactive, onMounted, computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'
import { useRandomColor } from "../Composables/useRandomColor";

const { randomColor, generateRandomColor } = useRandomColor();

const isPartiallyExtended = ref(false)
const isFullyExtended = ref(false)
const isCollapsed = ref(false)
const drawerStateText = computed(() => isCollapsed.value ? 'Open Drawer' : 'Close Drawer')
const hoveredIndex = ref(null)
const galleries = reactive([
    { name: 'Navigation Page', path: '/', folderName: 'floof' },
    { name: 'Welcome', path: '/welcome', folderName: 'splash' },
    { name: 'Ami', path: '/ami',folderName: 'amibot' },
    { name: 'Welcome Animation', path: '/hello', folderName: 'default' },
    { name: 'Word Drops', path: '/words', folderName: 'splash' },
    { name: 'Welcome 2', path: '/new',folderName: 'splash' },
    { name: 'Home', path: '/home', folderName: 'background' },
    { name: 'Gallery Page', path: '/choose', folderName: 'wondercat' },
    { name: 'Title Simple', path: '/intro', folderName: 'splash' },
    { name: 'Rain Gallery', path: '/rain', folderName: 'splash' },
    { name: 'Theme Builder', path: '/forge', folderName: 'wondershed' },
    { name: 'Gift Shop', path: '/gift', folderName: 'wonderchest' },
    { name: 'Make Art', path: '/makeart', folderName: 'memes' },
    { name: 'Pulser', path: '/sanctuary', folderName: 'nostalgia' },
    { name: 'Bot Cafe', path: '/botcafe', folderName: 'wonderbot' },
    { name: 'About', path: '/about', folderName: 'acrocats' },
    { name: 'Mission', path: '/mission', folderName: 'flower' },
    { name: 'Guestbook', path: '/guestbook', folderName: 'avatars' },
    { name: 'Values', path: '/values', folderName: 'floof' },
    ])

const { inertia } = usePage()

const navigateTo = (gallery, index) => {
    inertia.visit(gallery.path)
    galleries.push(galleries.splice(index, 1)[0])
}

const toggleCollapse = () => {
    isCollapsed.value = !isCollapsed.value
}

const isHovered = (index) => {
    return hoveredIndex.value === index
}

const hover = (index) => {
    hoveredIndex.value = index
}

const unhover = () => {
    hoveredIndex.value = null
}
onMounted(async () => {
    for(let gallery of galleries) {
        // Use gallery.folderName instead of gallery.name for fetching the image
        const response = await axios.get(`/images/${gallery.folderName}/random`);
        if(response.data.image) {
            gallery.image = response.data.image;
        }
    }
});

const toggleDrawer = () => {
    if (isCollapsed.value) {
        isCollapsed.value = false;
        isPartiallyExtended.value = true;
    } else if (isPartiallyExtended.value) {
        isPartiallyExtended.value = false;
        isFullyExtended.value = true;
    } else {
        isFullyExtended.value = false;
        isCollapsed.value = true;
    }
}

</script>

<style scoped>
.bubble {
    width: 6vw;
    height: 15vh;
}
.bubble-container {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.bubble-text {
    position: relative;
    z-index: 20;
    background: rgba(255, 255, 255, 0.8);
    border-radius: 0.3em;
    margin-top: 1em;
    font-weight: bold;
}
</style>
