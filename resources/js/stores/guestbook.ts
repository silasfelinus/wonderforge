import { defineStore } from 'pinia'
import { ref, toRaw } from 'vue'

export const useGuestbookStore = defineStore('guestbook', () => {
    const messages = ref([]);
    const form = ref({
        name: '',
        email: '',
        message: '',
    });
    const fetchMessages = async () => {
        try {
          const response = await fetch('/guestbook');

          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }

          const data = await response.json();
          messages.value = data.messages;
        } catch (error) {
          console.error('Fetch error:', error);
        }
      };
      
    const submitMessage = async () => {
        const csrfElement = document.querySelector('meta[name="csrf-token"]');

        if (!csrfElement) {
            throw new Error('CSRF token not found');
        }

        const csrfToken = csrfElement.getAttribute('content');

        if (!csrfToken) {
            throw new Error('CSRF token is empty');
        }

        const response = await fetch('/guestbook', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(toRaw(form.value)),
        });

        if (!response.ok) {
            throw new Error('Server error');
        }

        const data = await response.json();
        form.value = {
            name: '',
            email: '',
            message: '',
        };
        fetchMessages();
    };

    // fetch the messages when the store is initialized
    fetchMessages();

    return { messages, form, fetchMessages, submitMessage };
});
