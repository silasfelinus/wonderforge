<template>
    <div class="background" :style="{ backgroundImage: `url('https://server.cafepurr.com/assets/utility/backtree.webp')` }">
      <ButterflyGroup class="butterfly-group"/>
      <Head title="Welcome" />
      <Title />

      <header class="sm:fixed sm:top-0 sm:left-0 p-6 text-left">
        <h1 class="text-3xl font-bold text-white">Cafe Purr</h1>
        <Wildcard />
      </header>

      <main class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
          <CardComponent
            v-for="card in cards"
            :key="card.title"
            :card="card"
          />
        </div>
      </main>

      <footer class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
          <div class="flex items-center gap-4">
            <Link
              href="https://cafepurr.com/giftshop"
              class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
              Visit our GiftShop
            </Link>
          </div>
        </div>
      </footer>
    </div>
  </template>

  <script setup>
  import { Head, Link } from "@inertiajs/vue3";
  import CardComponent from "./CardComponent.vue";
  import ButterflyGroup from "./ButterflyGroup.vue";
  import Wildcard from "./Wildcard.vue";
  import Title from "./Title.vue";

  defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  });

  const cards = [
  {
    title: "Card 1",
    description: "This is a description for Card 1.",
    image: "https://via.placeholder.com/150",
    link: "#"
  },
  {
    title: "Card 2",
    description: "This is a description for Card 2.",
    image: "https://via.placeholder.com/150",
    link: "#"
  },
  {
    title: "Card 3",
    description: "This is a description for Card 3.",
    image: "https://via.placeholder.com/150",
    link: "#"
  },
  {
    title: "Card 4",
    description: "This is a description for Card 4.",
    image: "https://via.placeholder.com/150",
    link: "#"
  }
];
  </script>

  <style>
  .background {
    background-size: cover;
    background-position: center;
    min-height: 100vh;
    position: relative;
  }

  .butterfly-group {
    position: absolute;
    z-index: 1;
  }

  h1 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 2.5rem;
    }
  }
  </style>
