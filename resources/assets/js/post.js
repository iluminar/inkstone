require('./bootstrap');
post = require('./components/posts/single.vue');

const app = new Vue({
    el: '#app',
    components: {
        post
    }
});
