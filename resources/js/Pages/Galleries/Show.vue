<template>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-4 p-4">
      <div class="md:flex">
        <div class="md:flex-shrink-0">
          <img class="h-48 w-full object-cover md:w-48" :src="gallery.fav_image" alt="Favourite image">
        </div>
        <div class="p-8">
          <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ gallery.name }}</div>
          <p class="mt-2 text-gray-500">{{ gallery.description }}</p>
          <p class="mt-2 text-gray-500">Creator: {{ gallery.creator }}</p>
          <p class="mt-2 text-gray-500">URL: <a :href="gallery.url" class="text-indigo-500 hover:text-indigo-600">{{ gallery.url }}</a></p>
          <p class="mt-2 text-gray-500">Rating: {{ gallery.rating }}</p>
          <p class="mt-2 text-gray-500">Is Member: {{ gallery.isMember ? 'Yes' : 'No' }}</p>
          <p class="mt-2 text-gray-500">Is NSFW: {{ gallery.isNSFW ? 'Yes' : 'No' }}</p>
          <p class="mt-2 text-gray-500">Is Private: {{ gallery.isPrivate ? 'Yes' : 'No' }}</p>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    props: {
      gallery: Object
    }
  }
  </script>
