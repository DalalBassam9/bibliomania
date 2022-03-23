import Vue from 'vue';
import router from './router';
import App from './components/App';
import store from './store';
import StarsRating from 'vue-dynamic-star-rating';

Vue.component('stars-rating', StarsRating);

require('./bootstrap');

const app = new Vue({
    el: '#app',

    components: {
        App
    },

    router,

    store,
});
