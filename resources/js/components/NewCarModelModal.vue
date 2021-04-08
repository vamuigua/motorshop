<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Can't find a car model? Add one</div>
          <div class="card-body">
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#newCarModelFormModal"
              @click="success_msg = false"
            >
              Add Car Model
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="newCarModelFormModal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="newCarModelFormModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newCarModelFormModalLabel">
                      Add New Car Model
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                      @click="success_msg = false"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form
                      accept-charset="UTF-8"
                      class="form-horizontal"
                      enctype="multipart/form-data"
                      id="new_car_model_modal"
                    >

                        <div class="errors">
                            <p v-if="errors.length" class="error alert alert-danger">
                                <b>Please correct the following error(s):</b>
                                <ul>
                                <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </p>
                        </div>

                      <div class="form-group">
                        <label for="car_model" class="control-label">{{
                          "Car Model Name"
                        }}</label>
                        <input
                          class="form-control"
                          name="car_model"
                          type="text"
                          id="car_model"
                          placeholder="e.g Note"
                          v-model="car_model_name"
                        />
                      </div>

                    <!-- Car Make Options Component -->
                    <div class="form-group" id="specialDiv">
                        <label for="car_make_id" class="control-label">{{ "Car Make" }}</label>
                        <car-make-options-comp :carmodel="carmodel">
                        </car-make-options-comp>
                    </div>

                      <div class="form-group">
                        <input
                          class="btn btn-primary"
                          type="submit"
                          value="Create"
                          @click.prevent="handleSubmit"
                        />
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer d-flex justify-content-around">
                    <div v-if="isSuccess" class="alert alert-success" role="alert">
                      <strong>Success:</strong> <p>Car Model Added Successfully!</p>
                    </div>
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-dismiss="modal"
                      @click="success_msg = false"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import CarMakeOptionsComp from "./CarMakeOptions";

export default {
  name: "NewCarModelModal",
  props: ["carmodel"],
  components: {
    CarMakeOptionsComp,
  },
  data() {
    return {
      car_model_name: null,
      errors: [],
      success_msg: false,
    };
  },
  methods: {
    ...mapActions({
      addCarModel: "addCarModel",
    }),

    handleSubmit: function (e) {
      this.success_msg = false;
      this.errors = [];

      if (this.car_model_name) {
        var specialDiv = document.getElementById("specialDiv");
        var specialCarMake = specialDiv.getElementsByClassName(
          "specialCarMake"
        );

        let newCarModel = {
          name: this.car_model_name,
          car_make_id: specialCarMake[0].value,
        };

        axios
          .post("/admin/new_car_model", newCarModel)
          .then((response) => {
            if (response.data.created === true) {
              this.car_model_name = "";
              this.addCarModel(response.data.car_model);
              this.success_msg = true; // show success message
            } else if (response.data.created === false) {
              this.errors.push(response.data.error);
            }
          })
          .catch((err) => {
            err.response.data.errors.name.forEach((error) => {
              this.errors.push(error);
            });
          });
      } else {
        this.errors.push("The Car Model Name required");
      }
    },
  },
  computed: {
    isSuccess() {
      return this.success_msg;
    },
  },
};
</script>

<style>
</style>