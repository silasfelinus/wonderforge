<template>
    <div class="bg-cover bg-center min-h-screen relative" :style="{ backgroundImage: `url('https://server.cafepurr.com/assets/utility/backtree.webp')` }">
      <ButterflyGroup class="absolute z-10"/>

      <Head title="Welcome" />
      <Title />

      <header class="p-6 text-left sm:fixed sm:top-0 sm:left-0">
        <h1 class="text-3xl font-bold text-white shadow-text">Cafe Purr</h1>
      </header>
      <div class="status-wildcard absolute top-0 mt-20 ml-6">Status: <Wildcard /></div>
      <div><div class="mt-4">
</div></div>

      <div class="flex flex-col items-end fixed right-4 top-20 space-y-4">
        <ButtonPulse v-for="i in 4" :key="i" class="bg-blue-500 w-16 h-16 rounded-full" />
      </div>

      <main class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
          <CardComponent
            v-for="card in cards"
            :key="card.title"
            :card="card"
          />
        </div>
      </main>

      <WordDrops class="absolute bottom-0 z-10" />

      <footer class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
          <div class="flex items-center gap-4">
            <Link
              href="https://cafepurr.com/giftshop"
              class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
              Visit our GiftShop
            </Link>
            <template v-if="$page.props.canLogin">
              <Link
                href="/login"
                class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              >
                Login
              </Link>
            </template>
            <template v-if="$page.props.canRegister">
              <Link
                href="/register"
                class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              >
                Register
              </Link><TitleAnimation />
            </template>
          </div>
        </div>
        <ButtonPulse @click="openDocentChat" class="bg-blue-500 w-16 h-16 rounded-full fixed bottom-4 right-4">
            Chat
        </ButtonPulse>
      </footer>
    </div>
</template>
<script setup>
    import { Head, Link } from "@inertiajs/vue3";
    import CardComponent from "./CardComponent.vue";
    import ButterflyGroup from "./ButterflyGroup.vue";
    import Wildcard from "./Wildcard.vue";
    import Title from "./TitleAnimation.vue";
    import ButtonPulse from "./Button2.vue";
    import WordDrops from "./WordDrops.vue";
    import TitleAnimation from "./TitleAnimation.vue";

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
.status-wildcard {
  font-size: 1.75em; /* larger font size */
  color: #fff;
  text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
  background: rgba(0, 0, 0, 0.6);
  padding: 15px; /* larger padding */
  border-radius: 5px;
  margin-left: 40px; /* indent from left */
}

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
  .flex.flex-col.items-end.fixed.right-4.top-20.space-y-4 {
  position: relative; /* instead of fixed */
  right: 0; /* adjust as needed */
  overflow: hidden; /* remove overflow */
}
  </style>
