<template>
  <div class="favor">
    <i :class="[fstatus ? 'fas fa-bookmark' : 'far fa-bookmark']" @click="submit"></i>
    <form>
      <input type="hidden" name="_token" :value="csrf">
      <input type="hidden" :value="photo_id" name="photo_id">
      <input type="hidden" :value="fstatus" name="favor">
    </form>
    <!--     <i class="icon fas fa-bookmark"></i>
    <form action="/favorite" id="favorForm" method="POST">
      <input type="hidden" name="_token" :value="csrf">
      <input type="hidden" value="{{ $photo->id }}" name="photo_id">
      <input type="hidden" value="0" name="favor">
    </form>
    -->
  </div>
</template>

<script>
export default {
  components: {
    axios
  },
  data() {
    return {
      fstatus: 0,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  props: ["user_id", "photo_id"],
  methods: {
    status() {
      axios
        .get("/favor-status", {
          params: {
            photo_id: this.photo_id
          }
        })
        .then(response => {
          this.fstatus = response.data;
        });
    },
    favorToggle() {
      if (this.fstatus === 0) {
        this.fstatus = 1;
        console.log(this.fstatus);
        return this.fstatus;
      } else {
        this.fstatus = 0;
        console.log(this.fstatus);
        return this.fstatus;
      }
    },
    submit() {
        this.favorToggle();
      axios.post("/favorite", {
        _token: this.csrf,
        photo_id: this.photo_id,
        favor: this.fstatus
      });
    }
  },
  created() {
    this.status();
  }
};
</script>