<template>
  <div class="actions">
    <div>
      <p>{{ this.star_count }}</p>
      <i class="fas fa-star"></i>
    </div>
    <div>
      <p>{{ this.comment_count }}</p>
      <a :href="'/photo/'+ this.photo_id">
        <i class="fas fa-comment"></i>
      </a>
    </div>
    <action-favorite v-if="user_id > 0" :user_id="user_id" :photo_id="photo_id"></action-favorite>
  </div>
</template>
<script>
import axios from "axios";

export default {
  components: {
    axios
  },
  props: ["photo_id", "user_id"],
  data() {
    return {
      info: [],
      comment_count: 0,
      star_count: 0.0
    };
  },
  methods: {
    getInfo() {
      axios
        .get("/api/photoinfo", { 
            params:{
                photo_id: this.photo_id 
                }
            })
        .then(response => {
          this.info = response.data.photo;
          this.comment_count = response.data.comment_count;
          this.star_count = response.data.star_count;
          //console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  },
  created() {
    this.getInfo();
  }
};
</script>