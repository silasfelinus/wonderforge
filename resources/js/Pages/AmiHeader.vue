<template>
    <Head>
      <div class="flex flex-col items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white p-4" :style="{background: randomColor}">
        <h1 class="text-3xl font-bold mb-4">Header</h1>
        <Link
          href="https://cafepurr.com/giftshop"
          class="inline-flex items-center mb-2 text-lg hover:text-yellow-300 focus:outline-none"
        >
          Visit our GiftShop
        </Link>
        <template v-if="$page.props.canLogin">
          <Link
            href="/login"
            class="inline-flex items-center mb-2 text-lg hover:text-yellow-300 focus:outline-none"
          >
            Login
          </Link>
        </template>
        <template v-if="$page.props.canRegister">
          <Link
            href="/register"
            class="inline-flex items-center mb-2 text-lg hover:text-yellow-300 focus:outline-none"
          >
            Register
          </Link>
        </template>
      </div>
    </Head>
  </template>

  <script setup>
  import { useRandomColor } from '../Composables/useRandomColor';
  import { Head, Link } from "@inertiajs/vue3";

  const { randomColor } = useRandomColor();
  </script>
