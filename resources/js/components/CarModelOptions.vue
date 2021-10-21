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
        <select name="car_model_id" class="form-control" id="car_model_id">
            <option disabled>Select a car model</option>
            <option
                v-for="car_model in carModels"
                :key="car_model.id"
                :value="car_model.id"
                :selected="car_model.id == car.car_model_id"
            >
                {{ car_model.name }}
            </option>
        </select>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    name: "CarModelOptions",
    props: ["car"],
    data() {
        return {
            errors: null
        };
    },
    created() {
        this.loadCarModels();
    },
    methods: {
        ...mapActions({
            updateAllCarModels: "updateAllCarModels"
        }),

        async loadCarModels() {
            try {
                const uri = "/admin/all_car_models";
                let response = await axios(uri);
                if (response.status === 200) {
                    this.updateAllCarModels(response.data.carModels);
                }
            } catch (err) {
                this.errors = err;
            }
        }
    },
    computed: {
        ...mapGetters({
            carModels: "carModels"
        })
    }
};
</script>

<style></style>
