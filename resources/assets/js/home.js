require('./bootstrap');
home = require('./components/home.vue');

const app = new Vue({
    el: '#app',
    components: {
        home
    }
});
