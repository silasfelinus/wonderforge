import { defineStore } from 'pinia';

export const useSettingsStore = defineStore('settings', {
  state: () => ({
    background: 'default',
    screenfx: 'default',
    user: 'acroguest',
    clicks: 0,
    docent: 'ami',
    activeSound: true,
    activeChat: true,
    messages: [],
  }),
  actions: {
    setBackground(bg) {
      if (typeof bg === 'string' && bg.length > 0) {
        this.background = bg;
      } else {
        throw new Error('Invalid background');
      }
    },
    setScreenFX(fx) {
      // Similar validation as setBackground
      this.screenfx = fx;
    },
    setUser(user) {
      // Consider interacting with your server here
      if (typeof user === 'string' && user.length > 0) {
        this.user = user;
      } else {
        throw new Error('Invalid user');
      }
    },
    increaseClicks(amount) {
      if (Number.isInteger(amount) && amount > 0) {
        this.clicks += amount;
      } else {
        throw new Error('Invalid amount for clicks');
      }
    },
    // Similar methods for setDocent, toggleSound, and toggleChat
    addMessage(message) {
      // You might want to validate message here
      this.messages.push(message);
    },
  },
});
