<template>
  <div class="col-md-8 mx-auto">
    <h2 class="mb-4">Artist Search</h2>
    <form @submit.prevent="validateAndSearch">
      <input type="text" class="form-control" id="query" v-model="query" placeholder="Enter your search query" required>
      <button type="submit" class="form-control btn btn-secondary mt-2">Search</button>
    </form>
  </div>
  <div v-if="artists" class="mt-4 col-md-12">
    <div class="d-flex justify-content-between mt-5">
      <h2>Artist - {{ this.query }}</h2>
      <span class="text-lg my-auto">search Results: {{ artists.length }}</span>
    </div>

    <div class="row">
        <div class="col-md-3 my-2" v-for="artist in artists" :key="artist.mbid">
          <a :href="'/artists/show/'+ encodeURIComponent(artist.name)"  class="text-decoration-none">
            <div class="card h-100" >
              <img class="card-img-top" :src="artist.image[1]['#text']" alt="card image collar">
              <div class="card-body">
                <h5 class="card-title">{{ artist.name }}</h5>
                <p class="card-text">
                  <p><b>Listeners:</b> {{ artist.listeners }}</p>
                  <p><b>Streamable:</b> {{ artist.steamable }}</p>
                </p>
              </div>
            </div>
          </a>
        </div>
    </div>
  </div>
</template>
  
<script>

export default {
  data() {
    return {
      query: '',
      baseUrl: window.location.origin, 
      artists: null,
    };
  },
  methods: {
    async validateAndSearch() {
      const response = await fetch(`/artists/${this.query}`);
      const data = await response.json();
      this.artists = data;
    }

  },
  
};
</script>