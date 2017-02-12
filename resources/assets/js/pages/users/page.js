// route: github.repo.page
require('./../../bootstrap');
page = require('./../../components/users/page.vue');

const app = new Vue({
    el: '#app',
    components: {
        page
    }
});
