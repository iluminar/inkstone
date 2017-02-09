// route: user.github
require('./bootstrap');
repoList = require('./components/users/github.vue');

const app = new Vue({
    el: '#app',
    components: {
        repoList
    }
});
