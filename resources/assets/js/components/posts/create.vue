<template>
    <form role="form" method="POST" :action="url">
        <input type="hidden" name="_token" :value="token">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                Create New Post
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p class="control">
                        <input id="title" class="input" type="text" name="title" placeholder="Title of the Post">
                        <span class="help is-danger" v-if="errors">{{ errors.title }}</span>
                    </p>
                    <p class="control">
                        <input id="publish_time" class="input flatpickr" type="text" name="publish_time" placeholder="Publish Time">
                        <span class="help is-danger" v-if="errors">{{ errors.publish_time }}</span>
                    </p>
                    <p class="control">
                        <textarea id="content" class="textarea" name="content" placeholder="Your new blog post"></textarea>
                        <span class="help is-danger" v-if="errors">{{ errors.content }}</span>
                    </p>
                    <p class="control">
                        <input type="checkbox" name="draft">
                        save as draft
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
import Flatpickr from 'flatpickr'
    export default {
        data: () => ({
            token: Laravel.csrfToken,
            errors: errors,
            url
        }),
        mounted() {
            new SimpleMDE({element: document.getElementById("content")}),
            new Flatpickr(document.getElementById("publish_time"), {
                enableTime: true,
                altInput: true,
                altFormat: "Y-m-d H:i:s",
                enableSeconds: true,
                utc: true
            })
        }
    }
</script>
