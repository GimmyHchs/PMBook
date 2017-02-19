
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./vuex/store.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('loading', require('./components/modules/loading.vue'));
 Vue.component('message', require('./components/modules/message.vue'));

 Vue.component('project-table', require('./components/project/table.vue'));
 Vue.component('project-create', require('./components/project/create.vue'));
 Vue.component('project-right-nav', require('./components/project/right-nav.vue'));
 Vue.component('project-left-nav', require('./components/project/left-nav.vue'));
const app = new Vue({
    el: '#app',
    store,
    mounted(){
        console.log('Root Vue Mounted');
    }
});
