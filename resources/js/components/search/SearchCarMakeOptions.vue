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
            @change="getCarMakeModel($event)"
        >
            <option disabled selected>Select a Car make</option>
            <option
                v-for="car_make in carMakes"
                :key="car_make.id"
                :value="car_make.id"
            >
                {{ car_make.name }}
            </option>
        </select>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    name: "SearchCarMakeOptions",
    data() {
        return {
            errors: null
        };
    },
    created() {
        this.loadCarMakes();
    },
    methods: {
        ...mapActions({
            updateAllCarMakes: "updateAllCarMakes",
            updateAllCarModels: "updateAllCarModels"
        }),

        async loadCarMakes() {
            try {
                const uri = "/search/all_car_makes";
                let response = await axios(uri);
                if (response.status === 200) {
                    this.updateAllCarMakes(response.data.carMakes);
                }
            } catch (err) {
                this.errors = err;
            }
        },

        async getCarMakeModel(event) {
            try {
                let carMake_id = event.target.value;
                const uri = "/search/carmake/" + carMake_id + "/models";
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
            carMakes: "carMakes"
        })
    }
};
</script>

<style></style>
