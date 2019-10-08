/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/

import './bootstrap'
import Vue from 'vue'
import App from './App.vue'
import VueTheMask from 'vue-the-mask'

Vue.use(VueTheMask)

// Vuesax Component Framework
import Vuesax from 'vuesax'

Vue.use(Vuesax)

// Theme Configurations
import '../themeConfig.js'

// Globally Registered Components
import './globalComponents.js'

// Vue Router
import router from './router'

// Vuex Store
import store from './store/store'

// Vuesax Admin Filters
import './filters/filters'

// Vuejs - Vue wrapper for hammerjs
import {VueHammer} from 'vue2-hammer'

Vue.use(VueHammer)

// PrismJS
import 'prismjs'
// import 'prismjs/themes/prism-tomorrow.css'

Vue.config.productionTip = false;

const app = new Vue({
    data: {loadingActive: true},
    router,
    store,
    render: h => h(App)
}).$mount('#app');


axios.interceptors.request.use(function (response) {
    app.loadingActive = true;
    return response;
}, function (error) {
    app.loadingActive = true;
    return Promise.reject(error);
});


/*Post script*/
axios.interceptors.request.use(function (response) {
    app.loadingActive = true;
    return response;
}, function (error) {
    app.loadingActive = true;
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    app.loadingActive = false;
    return response;
}, function (error) {
    app.loadingActive = false;
    return Promise.reject(error);
});


router.beforeEach((to, from, next) => {
    app.loadingActive = true;
    next()
});


router.afterEach((to, from, next) => {
    setTimeout(() => app.loadingActive = false, 1500);
});
