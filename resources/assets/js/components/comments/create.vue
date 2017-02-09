<template>
    <form role="form" method="POST" :action="url">
        <input type="hidden" name="_token" :value="token">
        <div class="card">
            <div class="card-content">
                <a class="button is-fullwidth is-primary" @click="openCommentForm">Create New Comment</a>
            </div>
        </div>
        <div class="card" :class="{'is-hidden-tablet': hideForm}">
            <div class="card-content">
                <div class="content">
                    <p class="control">
                        <textarea id="content" class="textarea" name="content" placeholder="write your comment here"></textarea>
                    </p>
                </div>
            </div>
            <footer class="card-footer">
                <div class="card-footer-item">
                    <button type="submit" class="button is-primary">Save</button>
                </div>
            </footer>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['slug'],
        data: () => ({
            token: Laravel.csrfToken,
            hideForm: true,
            url: ''
        }),
        methods: {
            openCommentForm: function (e) {
                e.preventDefault();
                this.hideForm = !this.hideForm;
            }
        },
        mounted() {
            new SimpleMDE({element: document.getElementById("content")});
            this.url = '/posts/' + this.slug + '/comments';
        }
    }
</script>
