/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Bootstrap 4
require("./bootstrap");

// admin-lte
require("admin-lte");

// Bootstrap Datepicker
require("./datepicker");

// Bootstrap-select
require("bootstrap-select");

// Datatables
require("./datatables");

// Ekko Lightbox
require("./ekko-lightbox");

// ion.rangeSlider
require("./ion-rangeslider");

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

// Global registration of vue components
Vue.component(
    "NewCarMakeModal",
    require("./components/NewCarMakeModal.vue").default
);
Vue.component(
    "CarMakeOptions",
    require("./components/CarMakeOptions.vue").default
);
Vue.component(
    "CarModelOptions",
    require("./components/CarModelOptions.vue").default
);
Vue.component(
    "NewCarModelModal",
    require("./components/NewCarModelModal.vue").default
);

// Search vue components
Vue.component(
    "SearchCarMakeOptions",
    require("./components/search/SearchCarMakeOptions.vue").default
);

Vue.component(
    "SearchCarModelOptions",
    require("./components/search/SearchCarModelOptions.vue").default
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
        allCarModels: []
    },
    getters: {
        carMakes(state) {
            return state.allCarMakes;
        },
        carModels(state) {
            return state.allCarModels;
        }
    },
    mutations: {
        SET_ALL_CAR_MAKES(state, data) {
            state.allCarMakes = data;
        },
        SET_ALL_CAR_MODELS(state, data) {
            state.allCarModels = data;
        }
    },
    actions: {
        updateAllCarMakes({ commit }, data) {
            commit("SET_ALL_CAR_MAKES", data);
        },

        addCarMake({ commit, getters }, carMake) {
            var temp = getters.carMakes;
            temp.push(carMake);
            commit("SET_ALL_CAR_MAKES", temp);
        },

        updateAllCarModels({ commit }, data) {
            commit("SET_ALL_CAR_MODELS", data);
        },

        addCarModel({ commit, getters }, carModel) {
            var temp = getters.carModels;
            temp.push(carModel);
            commit("SET_ALL_CAR_MODELS", temp);
        }
    }
});

const app = new Vue({
    el: "#app",
    store
});
