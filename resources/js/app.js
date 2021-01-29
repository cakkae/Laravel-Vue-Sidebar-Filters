require('./bootstrap');
import {BadgerAccordion, BadgerAccordionItem} from 'vue-badger-accordion'

window.Vue = require('vue');

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('BadgerAccordion', BadgerAccordion);
Vue.component('BadgerAccordionItem', BadgerAccordionItem);

Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');

const app = new Vue({
    el: '#app',
});
