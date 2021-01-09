<template>
    <div class="text-center">
        <spinner v-if="loading"/>
        <div v-else-if="!not_found">

            <img :src="'/storage' + tournament.logo" alt="" v-if="tournament.logo">
            <h1>{{ tournament.name }}</h1>
        </div>
        <div uk-alert v-if="not_found">
            <a className="uk-alert-close" uk-close></a>
            <h3>404 турнир не найден</h3>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Spinner from '../components/Spinner';

export default {
    components: {
        Spinner
    },
    data: () => ({
        loading: true,
        tournament: [],
        not_found: false
    }),
    mounted() {
        this.loadTournament(this.$route.params.id);
    },
    methods: {
        loadTournament(id) {
            axios.get('/api/tournaments/' + id)
                .then(res => {
                    this.tournament = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    this.not_found = true;
                })
        }
    },
}
</script>

<style scoped>

</style>

