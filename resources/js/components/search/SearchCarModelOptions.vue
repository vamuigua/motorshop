<template>
    <div>
        <select name="car_model_id" class="form-control" id="car_model_id">
            <option disabled selected>Select a Car model</option>
            <option
                v-for="car_model in carModels"
                :key="car_model.id"
                :value="car_model.id"
            >
                {{ car_model.name }}
            </option>
        </select>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    name: "SearchCarModelOptions",
    computed: {
        ...mapGetters({
            carModels: "carModels"
        })
    }
};
</script>

<style></style>
