<template>
    <div>
        <div class="column is-8 is-offset-2">
            <div class="card">
                <header class="card-header">
                    <a href="" class="card-header-title">
                    {{ post.title }}
                    </a>
                </header>
                <div class="card-content">
                    <div class="content" v-html="content">
                    </div>
                </div>
                <footer class="card-footer">
                    <a class="card-footer-item" :href="'/posts/' + post.slug + '/edit'">Edit</a>
                    <a class="card-footer-item" @click="deletePost">Delete
                    </a>
                </footer>
                <confirm-dialog @open-dialog="openDialog" :is-active="isActive" :slug="post.slug"></confirm-dialog>
            </div>
        </div>
        <div class="column is-8 is-offset-2">
            <create-comments :slug="post.slug"></create-comments>
        </div>
        <div class="column is-8 is-offset-2">
            <comment-list :comments="post.comments"></comment-list>
        </div>
    </div>
</template>

<script>
import confirmDialog from './deletePostConfirmDialog'
import createComments from './../comments/create'
import commentList from './../comments/list'
    export default {
        components: {
            confirmDialog,
            createComments,
            commentList
        },
        data: () => ({
            post: data.post,
            content: '',
            isActive: false
        }),
        methods: {
            deletePost: function (e) {
                e.preventDefault();
                this.isActive = true;
            },
            openDialog: function (e) {
                this.isActive = false;
            }
        },
        mounted() {
            this.content = converter.makeHtml(this.post.content)
        }
    }
</script>
