<template>
    <div class="min-h-screen bg-gradient-to-r from-green-400 to-blue-500 flex flex-col items-center justify-center text-center p-6">
        <h1 class="text-4xl font-bold text-white mb-2">Welcome to our Guestbook</h1>
        <p class="text-xl text-white mb-10">Please leave a message below:</p>
        <div class="w-full max-w-xl mx-auto space-y-6 bg-white p-6 rounded-lg shadow-md">
            <div v-for="message in guestbook.messages" :key="message.id" class="border-t pt-4 first:border-t-0">
                <h2 class="text-lg font-semibold mb-1">{{ message.name }} <span class="text-sm text-gray-500">({{ message.email }})</span></h2>
                <p class="text-gray-800">{{ message.message }}</p>
            </div>
            <form @submit.prevent="submitMessage" class="space-y-4">
                <input v-model="guestbook.form.name" type="text" placeholder="Your Name" required class="w-full p-3 border rounded">
                <input v-model="guestbook.form.email" type="email" placeholder="Your Email" required class="w-full p-3 border rounded">
                <textarea v-model="guestbook.form.message" placeholder="Your Message" required class="w-full p-3 border rounded h-32"></textarea>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition-colors duration-200">Submit</button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { toRefs, onMounted } from 'vue';
import { useGuestbookStore } from '../../stores/guestbook';

const guestbook = useGuestbookStore();
const { form } = toRefs(guestbook.state);

onMounted(async () => {
  await guestbook.fetchMessages();
});

const submitMessage = async () => {
  await guestbook.submitMessage();
};
</script>

<style scoped>
.first:border-t-0 {
    border-top: 0;
}
</style>
