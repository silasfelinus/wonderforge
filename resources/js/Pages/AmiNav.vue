<template>
    <div class="fixed bottom-0 left-0 w-full z-50" :class="{ 'h-16': settings.navDrawerState === 'collapsed', 'h-40': settings.navDrawerState === 'partial', 'h-60': settings.navDrawerState === 'open' }">
        <button @click="toggleNavDrawer" class="block mx-auto my-2">Toggle</button>
        <div class="flex justify-around flex-wrap h-1/2 mb-2 overflow-visible">
            <div v-for="(item, index) in drawer01Items" :key="index" class="w-1/2 md:w-1/4 lg:w-1/6 xl:w-1/12">
                <Link :href="item.path">
                  <BubbleLink :gallery="item" :index="index" :hoveredIndex="hoveredIndex" @hover="handleHover(index)" @unhover="handleUnhover"/>
                </Link>
            </div>
        </div>
        <div class="flex justify-around flex-wrap h-1/2 overflow-visible">
            <div v-for="(item, index) in drawer02Items" :key="index" class="w-1/2 md:w-1/4 lg:w-1/6 xl:w-1/12">
                <Link :href="item.path">
                  <BubbleLink :gallery="item" :index="index" @hover="handleHover(index)" @unhover="handleUnhover"/>
                </Link>
            </div>
        </div>
    </div>
</template>


<script setup>
import { ref, onMounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import BubbleLink from './BubbleLink.vue'
import { useSettingsStore } from '../stores/settings'

const settings = useSettingsStore()
const drawer01Items = ref([])
const drawer02Items = ref([])
const hoveredIndex = ref(null)

const handleHover = (index) => {
  hoveredIndex.value = index
}

const handleUnhover = () => {
  hoveredIndex.value = null
}

const toggleNavDrawer = () => {
  settings.toggleNavDrawer()
}

onMounted(async () => {
  try {
    const drawer01Response = await fetch('/json/ami.json')
    const drawer01Data = await drawer01Response.json()
    drawer01Items.value = drawer01Data
})
</script>
