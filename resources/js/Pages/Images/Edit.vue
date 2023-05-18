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
  const route = useRoute()
  const form = useForm({
    image_url: '',
    title: '',
    description: '',
    // Add more fields as necessary
  })

  const submit = () => {
    form.put(`/api/images/${route.params.id}`)
  }

  // Fetch the image data when the component is created
  onMounted(async () => {
    const response = await fetch(`/api/images/${route.params.id}`)
    const image = await response.json()
    form.image_url = image.image_url
    form.title = image.title
    form.description = image.description
    // Add more fields as necessary
  })
  </script>
