require('./../../bootstrap');
createForm = require('./../../components/posts/create.vue');

const app = new Vue({
    el: '#app',
    components: {
        createForm
    }
});
