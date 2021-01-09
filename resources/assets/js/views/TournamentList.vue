<template>
    <div>
        <spinner v-if="loading"/>
        <table class="table" v-else-if="!emptyTournaments">
            <thead>
                <tr>
                    <th scope="col">Турнир</th>
                    <th scope="col">Начало</th>
                    <th scope="col">Конец</th>
                    <th scope="col">Организатор</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tournament in tournaments">
                    <td class="tournament-name">
                        <router-link :to="'/tournaments/' + tournament.id">{{ tournament.name }}</router-link>
                    </td>
                    <td>{{ tournament.start_at }}</td>
                    <td>{{ tournament.end_at }}</td>
                    <td>{{ tournament.manager }}</td>
                </tr>
            </tbody>
        </table>
        <div class="alert alert-warning" role="alert" v-if="emptyTournaments">
            {{ trans.header.empty_tournaments }}
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
    data(){
        return {
            tournaments: [],
            loading: true,
            emptyTournaments: false,
        }
    },
    mounted() {
        this.loadTournaments();
    },
    methods: {
        loadTournaments() {
            axios.get('/api/tournaments')
                .then(res => {
                    this.tournaments = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    this.emptyTournaments = true;
                })
        }
    },
}
</script>

<style scoped>
    .table thead {
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .table thead th{
        color: rgba(255, 255, 255, 0.5);
        font-size: 13px;
        border: none;
    }

    .table thead tr {
        background-color: #2a2d3a;
    }

    .table td{
        border: none;
        color: #fff;
    }

    .table tbody tr:nth-child(odd){
        background-color: #2a2d3a;
    }

    .table a{
        color: #fff;
    }

    .table a:hover{
        color: #43adfa;
        text-decoration: none;
    }

    .tournament-name{
        font-size: 16px;
        font-weight: 600;
    }
</style>
