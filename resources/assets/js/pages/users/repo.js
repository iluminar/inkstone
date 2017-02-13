// route: github.repo
require('./../../bootstrap');
repo = require('./../../components/users/repo.vue');

const app = new Vue({
    el: '#app',
    components: {
        repo
    }
});
