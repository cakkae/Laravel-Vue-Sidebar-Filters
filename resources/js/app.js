require('./bootstrap');
import {BadgerAccordion, BadgerAccordionItem} from 'vue-badger-accordion'

window.Vue = require('vue');

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('BadgerAccordion', BadgerAccordion);
Vue.component('BadgerAccordionItem', BadgerAccordionItem);

const app = new Vue({
    el: '#app',
});
