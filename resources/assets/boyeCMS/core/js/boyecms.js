window.Vue = require('vue')
import App from './App.vue'
import { router } from '_/router/router'
import { store } from '_/vuex'
window.axios = require('axios');
window.Nprogress = require('nprogress')
Vue.use(require('vue-moment'))
Vue.component('modal', require('~/lib/Modal.vue'))


const app = new Vue({
  el: '#cp',
  render: h => h(App),
  router: router,
  store
})
