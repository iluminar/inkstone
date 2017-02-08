require('./bootstrap');
editForm = require('./components/posts/edit.vue');

const app = new Vue({
    el: '#app',
    components: {
        editForm
    }
});
