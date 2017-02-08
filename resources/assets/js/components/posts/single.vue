<template>
    <div class="column is-8 is-offset-2">
        <div class="card">
            <header class="card-header">
                <a :href="'/posts/' + post.slug" class="card-header-title title is-3">
                {{ post.title }}
                </a>
            </header>
            <div class="card-content">
                <div class="content" v-html="content">
                </div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item">
                    <span class="icon is-medium" @click="togglePostPublishStatus(post.slug)">
                        <i v-bind:class="[{ 'fa fa-toggle-off' : draft, 'fa fa-toggle-on' : !draft}]"></i>
                    </span>
                </a>
                <a class="card-footer-item" :href="'/posts/' + post.slug + '/edit'">
                    <span class="icon is-medium">
                        <i class="fa fa-edit"></i>
                    </span>
                </a>
                <a class="card-footer-item" @click="deletePost">
                    <span class="icon is-medium">
                        <i class="fa fa-close"></i>
                    </span>
                </a>
            </footer>
            <confirm-dialog @open-dialog="openDialog" :is-active="isActive" :slug="post.slug"></confirm-dialog>
        </div>
    </div>
</template>

<script>
import confirmDialog from './deletePostConfirmDialog'
    export default {
        components: {
            confirmDialog
        },
        props: ['post'],
        data: () => ({
            content: '',
            draft: true,
            isActive: false
        }),
        mounted() {
            this.content = converter.makeHtml(this.post.content.substring(0, 400));
            this.draft = this.post.draft;
        },
        methods: {
            togglePostPublishStatus(slug, e) {
                axios.patch('/posts/' + slug + '/publish')
                     .then((response) => {
                        this.draft = !this.draft;
                     });
            },
            deletePost: function (e) {
                e.preventDefault();
                this.isActive = true;
            },
            openDialog: function (e) {
                this.isActive = false;
            }
        }
    }
</script>
