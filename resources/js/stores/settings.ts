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
    selectedNavItem: null,
    navDrawerState: 'open', // NavDrawer state can be 'open', 'partial', or 'collapsed'
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
      this.screenfx = fx;
    },
    setUser(user) {
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
    addMessage(message) {
      this.messages.push(message);
    },
    selectNavItem(item) {
      this.selectedNavItem = item;
    },
    toggleNavDrawer() {
        switch (this.navDrawerState) {
          case 'open':
            this.navDrawerState = 'partial';
            break;
          case 'partial':
            this.navDrawerState = 'collapsed';
            break;
          case 'collapsed':
            this.navDrawerState = 'open';
            break;
        }
      },
    setNavDrawerState(state) {
      const validStates = ['open', 'partial', 'collapsed'];
      if (validStates.includes(state)) {
        this.navDrawerState = state;
      } else {
        throw new Error('Invalid NavDrawer state');
      }
    },
  },
});
