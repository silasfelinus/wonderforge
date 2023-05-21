// stores/personality.js
import { defineStore } from 'pinia'

export const usePersonalityStore = defineStore({
  id: 'personality',
  state: () => ({
    botName: '',
    botImage: '',
    botAvatar: '',
    userAvatar: '',
    botPersonality: '',
  }),
  actions: {
    setBotName(name) {
      this.botName = name;
    },
    setBotImage(image) {
      this.botImage = image;
    },
    setBotAvatar(avatar) {
      this.botAvatar = avatar;
    },
    setUserAvatar(avatar) {
      this.userAvatar = avatar;
    },
    setBotPersonality(personality) {
      this.botPersonality = personality;
    },
  }
})
