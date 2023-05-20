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
  getters: {
    getBackground() {
      return this.background;
    },
    getScreenFX() {
      return this.screenfx;
    },
    getUser() {
      return this.user;
    },
    getClicks() {
      return this.clicks;
    },
    getDocent() {
      return this.docent;
    },
    getActiveSound() {
      return this.activeSound;
    },
    getActiveChat() {
      return this.activeChat;
    },
    getMessages() {
      return this.messages;
    },
  },
  actions: {
    setBackground(bg) {
      this.background = bg;
    },
    setScreenFX(fx) {
      this.screenfx = fx;
    },
    setUser(user) {
      this.user = user;
    },
    increaseClicks(amount) {
      this.clicks += amount;
    },
    setDocent(docent) {
      this.docent = docent;
    },
    toggleSound() {
      this.activeSound = !this.activeSound;
    },
    toggleChat() {
      this.activeChat = !this.activeChat;
    },
    addMessage(message) {
      this.messages.push(message);
    },
  },
});
