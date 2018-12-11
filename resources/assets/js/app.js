
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var iView = require('iview');
import 'iview/dist/styles/iview.css';

Vue.use(iView);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
var app = new Vue({
    el: '#app',
    mounted() {
        window.Echo.channel('channel-name').listen('PushMessageEvent', (e) => {
            // this.messages.push(e.message);
            this.$Notice.error({
                title: '用户退出提醒',
                desc: e.message
            });
            console.log(e.message);
        });
        console.log('Component mounted1.');
    }
});