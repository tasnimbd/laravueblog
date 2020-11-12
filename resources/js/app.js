require('./bootstrap');
window.Vue = require('vue');

//input editor support
import 'v-markdown-editor/dist/v-markdown-editor.css'
import Editor from 'v-markdown-editor'
// global register
Vue.use(Editor);

//Vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from './store/index'
const store = new Vuex.Store(
  storeData
)

//support moment js
import {filter} from './filter'

//view router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);

//v-form
import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//v-form

// SweetAlert2 ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;
//end sweetalert2



const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash'
  })

const app = new Vue({
    el: '#app',
    router,
    store
});
