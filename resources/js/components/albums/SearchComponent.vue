<template>
    <div class="col-md-8 mx-auto">
      <h2 class="mb-4">Album Search</h2>
      <form @submit.prevent="validateAndSearch">
        <input type="text" class="form-control" id="query" v-model="query" placeholder="Enter your search query" required>
        <button type="submit" class="form-control btn btn-secondary mt-2">Search</button>
      </form>
    </div>
    <div v-if="albums" class="mt-4 col-md-12">
      <div class="d-flex justify-content-between mt-5">
        <h2>Album - {{ this.query }}</h2>
        <span class="text-lg my-auto">search Results: {{ albums.length }}</span>
      </div>

      <div class="row">
          <div class="col-md-3 my-2" v-for="album in albums" :key="album.mbid">
            <a :href="'/album/show/'+ encodeURIComponent(album.artist)+'/'+encodeURIComponent(album.name)"  class="text-decoration-none">
              <div class="card h-100">
                <img class="card-img-top":src="album.image[1]['#text']" alt="card image collar">
                <div class="card-body">
                  <h5 class="card-title">{{ album.name }}</h5>
                  <p class="card-text"><b>Artist:</b> {{ album.artist }}</p>
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
        albums: null,
      };
    },
    methods: {
      async validateAndSearch() {
        const response = await fetch(`/albums/${this.query}`);
        const data = await response.json();
        this.albums = data;
        console.log(data);
      },
    },
  };
</script>