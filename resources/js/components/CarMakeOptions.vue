<template>
  <select name="car_make_id" class="form-control" id="car_make_id">
    <option
      v-for="car_make in car_makes"
      :key="car_make.id"
      :value="car_make.id"
      :selected="car_make.id == carmodel.car_make_id"
    >
      {{ car_make.name }}
    </option>
  </select>
</template>

<script>
export default {
  props: ["car_makes", "carmodel"],
};
</script>

<style>
</style>