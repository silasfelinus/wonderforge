import { defineStore } from "pinia";

export const useDemoStore = defineStore({
  id: "demo",

  state: () => ({
    count: 0,
  }),

  actions: {
    increment() {
      this.count++;
    },
    decrement() {
      this.count--;
    },
  },

  getters: {
    isPositive: (state) => state.count > 0,
  },
});
