require('./bootstrap');
import {BadgerAccordion, BadgerAccordionItem} from 'vue-badger-accordion'
import Notifications from "vt-notifications";

window.Vue = require('vue');
Vue.use(Notifications);

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('BadgerAccordion', BadgerAccordion);
Vue.component('BadgerAccordionItem', BadgerAccordionItem);

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
Vue.prototype.$userName = document.querySelector("meta[name='user-name']").getAttribute('content');

const app = new Vue({
    el: '#app',
});
