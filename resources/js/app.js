import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import SearchArtists from './components/artists/SearchComponent.vue';
app.component('search-artists', SearchArtists);

import SearchAlbums from './components/albums/SearchComponent.vue';
app.component('search-albums', SearchAlbums);


app.mount('#app');

