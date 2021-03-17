<template>
  <div>
    <div v-if="errors" class="alert alert-danger" role="alert">
      {{ errors }}
      <button
        type="button"
        class="close"
        data-dismiss="alert"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <select name="car_make_id" class="form-control" id="car_make_id">
      <option
        v-for="car_make in updatedCarMakes"
        :key="car_make.id"
        :value="car_make.id"
        :selected="car_make.id == carmodel.car_make_id"
      >
        {{ car_make.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: ["carmodel"],
  data() {
    return {
      errors: null,
    };
  },
  created() {
    this.loadCarMakes();
  },
  methods: {
    async loadCarMakes() {
      try {
        const uri = "/admin/all_car_makes";
        let response = await axios(uri);
        if (response.status === 200) {
          this.$store.state.allCarMakes = response.data.carMakes;
        }
      } catch (err) {
        this.errors = err;
        console.error(err);
      }
    },
  },
  computed: {
    updatedCarMakes() {
      return this.$store.state.allCarMakes;
    },
  },
};
</script>

<style>
</style>