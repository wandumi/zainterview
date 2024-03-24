import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ArtistsComponent from './components/Search/ArtistsComponent.vue';
app.component('artists-component', ArtistsComponent);

import AlbumsComponent from './components/Search/AlbumsComponent.vue';
app.component('albums-component', AlbumsComponent);

app.mount('#app');
