import router from './router';
import Vue from 'vue'
import App from './views/App'
import VueBraintree from 'vue-braintree'

Vue.use(VueBraintree)

 require('./bootstrap');

 window.Vue = require('vue');

 window.axios = require('axios'); //per usare axios
 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';







  const app = new Vue({
      el: '#root',
      render: h=>h(App),
      router,
  });
