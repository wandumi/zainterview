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
            <div class="card h-100">
                  <img class="card-img-top" :src="artist.image[1]['#text']" alt="card image collar">
                  <div class="card-body">
                    <a :href="'/artists/show/'+ encodeURIComponent(artist.name)"  class="text-decoration-none text-black">
                        <h5 class="card-title">{{ artist.name }}</h5>
                    </a>
                    <div class="card-text">
                        <p><b>Listeners:</b> {{ artist.listeners }}</p>
                        <p><b>Streamable:</b> {{ artist.streamable }}</p>
                    </div>
                      <a class="btn btn-small btn-secondary d-block" 
                          v-on:click.prevent="saveArtist(encodeURIComponent(artist.name))"
                              v-if="userAuth !== 0">Save</a>

                  </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>

export default {
    props: {
        userAuth: {
            type: Number,
            required: true
        },
    },
  data() {
    return {
      query: '',
      artists: null,
        done: ''
    };
  },
  methods: {

    async validateAndSearch() {
      const response = await fetch(`/artists/${this.query}`);
      const data = await response.json();
      this.artists = data;
    },

    async saveArtist(artistId){

        const getArtist = await fetch(`/artists_search/${artistId}`);
        const data = await getArtist.json();

        const formData = {
            'name': data.artistJson.name,
            'image': data.artistJson.image[1]['#text'],
            'summary': data.artistJson.bio['summary'],
        }

        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const saveData = fetch('/artists', {
            method: 'POST',
            headers: {
                'X-XSRF-TOKEN': token,
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(formData)
        }).then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            alert(`You have saved ${decodeURIComponent(artistId)}`);
           
        }).catch(error => {
          alert(`You have already saved ${decodeURIComponent(artistId)},`);
        });



    }

  },

};
</script>
