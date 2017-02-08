<template>
    <div class="modal" :class="{'is-active': isActive}">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box column is-6 is-offset-3 has-text-centered">
                <p class="title is-5">Do you really want to delete this post</p>
                <button class="button is-danger" @click="confirm">Yes</button>
                <button class="button" @click="cancel">Cancel</button>
            </div>
        </div>
        <button class="modal-close" @click="cancel"></button>
    </div>
</template>

<script>
    export default {
        props: ['isActive', 'slug'],
        methods: {
            confirm: function (e) {
                location.href = '/posts/' + this.slug + '/delete';
            },
            cancel: function (e) {
                this.$emit('open-dialog');
            }
        }
    }
</script>