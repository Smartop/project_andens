<template>
  <div class="gallery no-frame">
    <div
      class="infinite-scroll"
      v-infinite-scroll="loadMore"
      infinite-scroll-disabled="busy"
      infinite-scroll-distance="4"
    >
      <div class="photo-block" v-for="(photo, $index) in photos" :key="$index">
        
        <a :href="'photo/'+photo.id">
          <img :src="photo.file_name" :alt="photo.title" width="400px" height="200px">
        </a>
        <infinite-loading-actions :photo_id="photo.id" :user_id="user"></infinite-loading-actions>
      </div>
    </div>
  </div>
</template>
 
<script>
import axios from "axios";
import infiniteScroll from "vue-infinite-scroll";

var api = "/api/photos"; //or url

export default {
  components: {
    infiniteScroll,
    axios
  },
  props: ["user"],
  data() {
    return {
      page: 1,
      limit: 0,
      photos: [],
      busy: false,
      paginate: 3
    };
  },
  methods: {
    getData: function() {
      axios.get(api).then(response => {
        this.limit = response.data.last_page;
        this.paginate = response.data.per_page;
      });
    },
    loadMore() {
      this.busy = false;
      axios
        .get(api, {
          params: {
            page: this.page
          }
        })
        .then(res => {
          if (this.page <= this.limit) {
            this.page++;
            const append = res.data.data.slice(0, this.paginate);
            this.photos = this.photos.concat(append);
            this.busy = false;
          } else {
            this.busy = true;
          }
        })
        .catch(err => {
          this.busy = true;
        });
    }
  },
  created() {
    this.getData();
  }
};
</script>