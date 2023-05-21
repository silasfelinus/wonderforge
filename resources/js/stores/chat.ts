import { defineStore } from 'pinia'

export const useStore = defineStore({
  id: 'chat',
  state: () => ({
    chatHistory: [],
    personality: 'You are chatting with AMI, the Anti-Malaria Intelligence.',  // Default personality
  }),
  actions: {
    addMessage(role, content) {
      this.chatHistory.push({role, content});
    },
    async sendMessage(message) {
      this.addMessage('user', message);

      // Call your chat endpoint here and pass the personality from the state
      const response = await fetch('/api/chat', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          personality: this.personality,
          message: message
        })
      });
      const data = await response.json();

      if (response.ok) {
        this.addMessage('assistant', data.message);
      } else {
        // handle error
        this.addMessage('assistant', 'An error occurred. Please try again later.');
      }
    },
    setPersonality(newPersonality) {
      this.personality = newPersonality;
    }
  }
});
