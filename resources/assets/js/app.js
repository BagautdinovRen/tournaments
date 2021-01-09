// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

require('./bootstrap');


import Vue from 'vue';
import router from './router'

Vue.prototype.trans = window.trans;

const app = new Vue({
    el: '#app',
    data: {

    },
    router
});
