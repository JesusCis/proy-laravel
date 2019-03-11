
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import moment from "moment";
import { Form, HasError, AlertError } from 'vform';

import swal from 'sweetalert2';
window.swal - swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 8000
  });

window.toast = toast;

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })

let routes = [
    { path: '/inicio', component: require('./components/inicio.vue')},
    { path: '/perfiles', component: require('./components/perfiles.vue') },
    { path: '/usuarios', component: require('./components/usuarios.vue') }
  ]

  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })


  Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
  });

  Vue.filter('mydate', function(created){
    return moment(created).format('ll');
  });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    router
});
