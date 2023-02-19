
require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import {routes} from './router';

window.events = new Vue();

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

window.flash = function(message) {
    window.events.$emit('flash',message);
}

Vue.component('flash', require('./components/Flash.vue'));
    


const router = new VueRouter({
    routes: routes,
    mode: "history"
})

const app = new Vue({
    router,
    el: '#app',
}).$mount('#app');
