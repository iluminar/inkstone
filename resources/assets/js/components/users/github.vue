<template>
    <div class="column is-8 is-offset-2">
        <div class="card">
            <div class="card-content-item">
                <p class="title is-3 has-text-centered">
                Your Github Repository
                <a :href="url" class="button is-base is-pulled-right">Refresh Data</a>
                </p>
            </div>
            <div class="card-content-item" v-for="repo in repos">
                <a :href="repo.name + '/readme'" class="" >{{ repo.name }}</a>
                <span class="tag is-warning is-pulled-right" v-if="repo.language">{{ repo.language }}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: () => ({
            repos: data.repos,
            url: '/' + data.username + '/github/refresh'
        })
    }
</script>