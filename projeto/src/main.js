// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

Vue.use(Vuex)
Vue.use(VueResource)
Vue.use(VueRouter)

import App from './App'
import router from './router'

Vue.config.productionTip = false

/* eslint-disable no-new */




new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
});
