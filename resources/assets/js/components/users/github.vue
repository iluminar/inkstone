<template>
    <div class="column is-8 is-offset-2">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                Your Github Repository
                <a :href="url" class="button is-primary is-pulled-right">Refresh Data</a>
                </p>
            </header>
            <div class="card-content-item" v-for="repo in repos">{{ repo.name }}</div>
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