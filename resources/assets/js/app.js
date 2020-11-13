
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert');
window.$ = require('jquery');
import StarRating from 'vue-star-rating'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('products', require('./components/ProductComponent.vue'));
Vue.component('checkout', require('./components/CheckoutComponent.vue'));
Vue.component('detail', require('./components/DetailComponent.vue'));
Vue.component('star-rating', StarRating);

const app = new Vue({
    el: '#app'
});
