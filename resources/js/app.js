/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
require("admin-lte");
require("bootstrap-datepicker");
require("./datepicker");
require("bootstrap-select");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "NewCarMakeModal",
    require("./components/NewCarMakeModal.vue").default
);
Vue.component(
    "CarMakeOptions",
    require("./components/CarMakeOptions.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vuex from "vuex";
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        allCarMakes: [],
        errors: null
    }
});

const app = new Vue({
    el: "#app-admin",
    store,
    data() {
        return {
            errors: null
        };
    },
    created() {
        this.loadCarMakes();
    },
    computed: {
        updatedCarMakes() {
            return store.state.allCarMakes;
        }
    },
    methods: {
        async loadCarMakes() {
            try {
                let response = await axios("/admin/all_car_makes");
                if (response.status === 200) {
                    store.state.allCarMakes = response.data.carMakes;
                }
            } catch (err) {
                this.errors = err;
                console.error(err);
            }
        }
    }
});
