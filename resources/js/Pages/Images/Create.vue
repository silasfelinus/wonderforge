<template>
    <div>
      <form @submit.prevent="submit">
        <input v-model="form.image_url" placeholder="Image URL" />
        <input v-model="form.title" placeholder="Title" />
        <textarea v-model="form.description" placeholder="Description"></textarea>
        <!-- Add more fields as necessary -->
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>

  <script setup>

  const form = useForm({
    image_url: '',
    title: '',
    description: '',
    // Add more fields as necessary
  })

  const submit = () => {
    form.post('/api/images')
  }
  </script>
