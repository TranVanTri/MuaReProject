
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('modal-shoppingcart', require('./components/modal-shoppingcart.vue').default);
Vue.component('cart-info', require('./components/cart-info.vue').default);
Vue.component('comment-vue', require('./components/comment/CommentVue.vue').default);
Vue.component('single-comment', require('./components/comment/SingleComment.vue').default);
Vue.component('comments', require('./components/comment/Comments.vue').default);

const app = new Vue({
    el: '#app'
});
