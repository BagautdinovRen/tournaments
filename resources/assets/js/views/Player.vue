<template>
    <div>
        <spinner v-if="loading"/>
        <div v-else-if="!not_found">
            <h1>{{ player.name }}</h1>
            <p class="uk-text-lead">{{ player.country.name }}</p>
            <p>
                <span>{{ player.class_character.name }}</span>
                <img :src="'/storage/' + player.class_character.logo" alt="player.country.name">
            </p>

            <p class="uk-text-lead" v-if="player.tournaments.length">{{ player.tournaments[0].name }}</p>
            <p class="uk-text-lead">Побед: {{ player.countWinDuels }}</p>
            <p class="uk-text-lead">Поражений: {{ player.countLoseDuels }}</p>
        </div>
        <div uk-alert v-if="not_found">
            <a class="uk-alert-close" uk-close></a>
            <h3>404 пост не найден</h3>
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
        player: [],
        not_found: false
    }),
    mounted() {
        this.loadPlayer(this.$route.params.id);
        console.log(this.$route.app);
    },
    methods: {
        loadPlayer(id) {
            axios.get('/api/players/' + id)
                .then(res => {
                    this.player = res.data;
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

