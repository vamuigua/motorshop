<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Can't find a car make? Add one</div>
          <div class="card-body">
            <!-- Button trigger modal -->
            <button
              type="button"
              class="btn btn-primary"
              data-toggle="modal"
              data-target="#newCarMakeFormModal"
              @click="success_msg = false"
            >
              Add Car Make
            </button>

            <!-- Modal -->
            <div
              class="modal fade"
              id="newCarMakeFormModal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="newCarMakeFormModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newCarMakeFormModalLabel">
                      Add New Car Make
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
                      id="new_car_make_modal"
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
                        <label for="car_make" class="control-label">{{
                          "Car Make Name"
                        }}</label>
                        <input
                          class="form-control"
                          name="car_make"
                          type="text"
                          id="car_make"
                          placeholder="e.g BMW"
                          v-model="car_make_name"
                        />
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
                      <strong>Success:</strong> <p>Car Make Added Successfully!</p>
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

export default {
  name: "NewCarMakeModal",
  data() {
    return {
      car_make_name: null,
      errors: [],
      success_msg: false,
    };
  },
  methods: {
    ...mapActions({
      addCarMake: "addCarMake",
    }),

    handleSubmit: function (e) {
      this.success_msg = false;
      this.errors = [];

      if (this.car_make_name) {
        let newCarMake = { name: this.car_make_name };

        axios
          .post("/admin/new_car_make", newCarMake)
          .then((response) => {
            if (response.data.created === true) {
              this.car_make_name = "";
              this.addCarMake(response.data.car_make);
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
        this.errors.push("The Car Make Name required");
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