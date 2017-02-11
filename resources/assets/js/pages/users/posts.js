// route: user.posts
require('./../../bootstrap');
list = require('./../../components/posts/list.vue');

const app = new Vue({
    el: '#app',
    components: {
        list
    }
});
