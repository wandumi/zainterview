<template>
  <div>
    <div class="max-w-2xl mx-auto p-6 mt-5">
      <form @submit.prevent="validateAndSearch">
        <input type="text" class="form-control" id="query" v-model="query" placeholder="Enter your search query" required>
        <button type="submit" class="form-control btn btn-secondary mt-2">Search</button>
      </form>
    </div>
    <div v-if="artists" class="mt-4">
      <div class="d-flex justify-content-between ">
        <h2>Artists</h2>
        <span class="text-lg my-auto">search Results: {{ artists.length }}</span>
      </div>

      <div class="row">
          <div class="col-md-4 my-2" v-for="artist in artists" :key="artist.name">
                <div class="card h-100">
                  <img class="card-img-top" :src="artist.image" alt="card image collar">
                  <div class="card-body">
                    <h5 class="card-title">Artists {{index}}</h5>
                    <p class="card-text">{{ artist.name }}</p>
                  </div>
                </div>
          </div>
      </div>
    </div>
  </div>
</template>
  
<script>
export default {
  data() {
    return {
      query: '',
      artists: null,
    };
  },
  methods: {
    async validateAndSearch() {
      const response = await fetch(`/artists/${this.query}`);
      const data = await response.json();
      this.artists = data;
      
      console.log(data);
    },
  },
};
</script>