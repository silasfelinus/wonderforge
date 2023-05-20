<template>
    <div id="spotify-player"></div>
  </template>

  <script setup>
  import { onMounted, ref } from "vue";

  const player = ref(null);

  window.onSpotifyWebPlaybackSDKReady = () => {
    player.value = new Spotify.Player({
      name: 'Cafe Purr Spotify Player',
      getOAuthToken: cb => { cb(import.meta.env.VITE_SPOTIFY_KEY); }
    });

    // Error handling
    player.value.addListener('initialization_error', ({ message }) => { console.error(message); });
    player.value.addListener('authentication_error', ({ message }) => { console.error(message); });
    player.value.addListener('account_error', ({ message }) => { console.error(message); });
    player.value.addListener('playback_error', ({ message }) => { console.error(message); });

    // Playback status updates
    player.value.addListener('player_state_changed', state => { console.log(state); });

    // Ready
    player.value.addListener('ready', ({ device_id }) => {
      console.log('Ready with Device ID', device_id);
    });

    // Not Ready
    player.value.addListener('not_ready', ({ device_id }) => {
      console.log('Device ID has gone offline', device_id);
    });

    // Connect to the player!
    player.value.connect();
  };

  onMounted(() => {
    if (window.Spotify) {
      window.onSpotifyWebPlaybackSDKReady();
    }
  });
  </script>
