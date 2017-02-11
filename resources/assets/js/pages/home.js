require('./../bootstrap');
home = require('./../components/home/index.vue');

const app = new Vue({
    el: '#app',
    components: {
        home
    }
});
