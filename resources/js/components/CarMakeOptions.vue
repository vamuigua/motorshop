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
    <select
      name="car_make_id"
      class="form-control specialCarMake"
      id="car_make_id"
    >
      <option disabled>Select a car make</option>
      <option
        v-for="car_make in carMakes"
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
import { mapActions, mapGetters } from "vuex";

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
    ...mapActions({
      updateAllCarMakes: "updateAllCarMakes",
    }),

    async loadCarMakes() {
      try {
        const uri = "/admin/all_car_makes";
        let response = await axios(uri);
        if (response.status === 200) {
          this.updateAllCarMakes(response.data.carMakes);
        }
      } catch (err) {
        this.errors = err;
      }
    },
  },
  computed: {
    ...mapGetters({
      carMakes: "carMakes",
    }),
  },
};
</script>

<style>
</style>