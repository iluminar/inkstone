require('./../../bootstrap');
post = require('./../../components/posts/details.vue');

const app = new Vue({
    el: '#app',
    components: {
        post
    }
});
