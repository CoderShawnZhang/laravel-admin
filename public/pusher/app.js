
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
Vue.component('ivuew-component', require('./components/iview.vue'));

var app = new Vue({
    el: '#app',
    mounted() {
        window.Echo.channel('channel-name').listen('PushMessageEvent', (e) => {
            // this.messages.push(e.message);
            this.$Message.config({top:70,duration:3});
            this.$Notice.config({top:50,duration:3});
            this.$Message.info('This is a info tip');
            this.$Notice.error({
                title: '用户退出提醒',
                desc: e.message
            });
        });
    }
});