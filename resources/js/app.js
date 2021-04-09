/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Bootstrap 4
require("./bootstrap");
// admin-lte
require("admin-lte");
// Datepicker
require("bootstrap-datepicker");
require("./datepicker");
// Bootstrap-select
require("bootstrap-select");
// Datatables Depedencies
var pdfMake = require("pdfmake");
var pdfFonts = require("pdfmake/build/vfs_fonts.js");
pdfMake.vfs = pdfFonts.pdfMake.vfs;

require("datatables.net-bs4");
require("datatables.net-buttons-bs4");
require("datatables.net-buttons/js/buttons.colVis.js")();
require("datatables.net-buttons/js/buttons.html5.js")();
require("datatables.net-buttons/js/buttons.print.js")();
require("datatables.net-fixedheader-bs4");
require("datatables.net-responsive-bs4");
require("./datatables");

// Eko Lightbox
require("ekko-lightbox");

$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        alwaysShowClose: true
    });
});

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

// Globally registration on vue components
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
    el: "#app-admin",
    store
});
