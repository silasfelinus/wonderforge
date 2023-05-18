<template>
  <div class="background" :style="{ backgroundImage: `url('https://server.cafepurr.com/assets/utility/backtree.webp')` }">
    <ButterflyGroup class="butterfly-group"/>
      <Head title="Welcome" />

      <header class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
        <Link
          v-if="$page.props.auth.user"
          :href="route('dashboard')"
          class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        >
          Dashboard
        </Link>

        <template v-else>
          <Link
            :href="route('login')"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Log in
          </Link>

          <Link
            v-if="canRegister"
            :href="route('register')"
            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
          >
            Register
          </Link>
        </template>
      </header>

      <main class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
          <Card
            href="https://cafepurr/gallery"
            imageUrl="https://server.cafepurr.com/assets/utility/backtree.webp"
            title="Next-Generation Gallery"
            description="This is what happens when Silas and Superkate get 6 months of unfiltered 24/7 access to private art modelers. The stuff we'll show publicly, anyway."
            />
          <Card
            href="https://cafepurr.com/wonderforge"
            imageUrl="https://server.cafepurr.com/assets/utility/backtree.webp"
            title="Wonderforge"
            description="Enjoy the intersection of art and cutting-edge technology with Cafe Purr's Wonderforge. Make art, play games, and chat with one of our Robot docents. Anything is possible with Wonderforge!"
          />

          <Card
            href="https://cafepurr.com/amibot"
            imageUrl="https://server.cafepurr.com/assets/utility/backtree.webp"
            title="AMI - Anti-Malaria Intelligence"
            description="Hi, I'm Amibot! I'm volunteering as a Cafe Purr Robot Docent to get more training as a chatbot, but my primary directive is to help eradicate malaria on this planet. Every interaction helps me meet my objective. Would you like to play a game?"
          />

          <Card
            imageUrl="https://server.cafepurr.com/assets/utility/backtree.webp"
            title="Membership"
            description="Due to the sensitive nature of art, and the implicit impossibility of maintaining a consistent set of community standards agreeable by all, the member's vault is restricted to members only. Please contact for details."
          />
        </div>
      </main>

      <footer class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
          <div class="flex items-center gap-4">
            <a
              href="https://cafepurr.com/giftshop"
              class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
              GiftShop
            </a>
          </div>
        </div>
      </footer>
    </div>
  </template>

<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Card from "./Card.vue";
import ButterflyGroup from "./ButterflyGroup.vue";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
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

@media (max-width: 768px) {
  /* Adjust styles for mobile here */
}
</style>
