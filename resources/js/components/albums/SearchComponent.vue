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
            <div class="card h-100">
              <img class="card-img-top" :src="album.image[1]['#text']" alt="card image collar">
              <div class="card-body">
                    <a :href="'/album/show/'+ encodeURIComponent(album.artist)+'/'+encodeURIComponent(album.name)"  
                       class="text-decoration-none text-black">
                      <h5 class="card-title">{{ album.name }}</h5>
                    </a>
                    <p class="card-text"><b>Artist:</b> {{ album.artist }}</p>
                  </div>
                
                
                <a class="btn btn-small btn-secondary d-block m-2" 
                      v-on:click.prevent="saveAlbum(encodeURIComponent(album.artist), encodeURIComponent(album.name) )"
                                v-if="userAuth !== 0">Save</a>
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
        albums: null,
      };
    },
    methods: {
      async validateAndSearch() {
        const response = await fetch(`/albums/${this.query}`);
        const data = await response.json();
        this.albums = data;

      },

      async saveAlbum(artistId, albumId){
        
        const getAlbum = await fetch(`/album_search/${artistId}/${albumId}`);
        const data = await getAlbum.json();

        const formData = {
            'name': data.albumJson.name,
            'artist': data.albumJson.artist,
            'image': data.albumJson.image[1]['#text'],
            'url': data.albumJson.url,
        }

        const token = document.head.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const saveData = fetch('/albums', {
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
            alert(`You have saved ${decodeURIComponent(artistId)} / ${decodeURIComponent(albumId)}`);
           
        }).catch(error => {
          console.log(error);
          alert(`You have already saved ${decodeURIComponent(artistId)} / ${decodeURIComponent(albumId)}`);
        });


      }
    },
  };
</script>
