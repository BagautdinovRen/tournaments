<template>
    <div>
        <spinner v-if="loading"/>
        <table class="table" v-else-if="!emptyPlayers">
            <thead>
            <tr>
                <th scope="col" @click="sortPlayers('name')">Имя</th>
                <th scope="col" @click="sortPlayers('country.name')">Страна</th>
                <th scope="col" @click="sortPlayers('class_character.name')">Класс</th>
                <th scope="col" @click="sortPlayers('age')">Возраст</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="player in players">
                <td class="player-name">
                    <router-link :to="'/players/' + player.id">{{ player.name }}</router-link>
                </td>
                <td>{{ player.country.name }}</td>
                <td class="class-logo">
                    <img :src="'/storage/' + player.class_character.logo" :alt="player.class_character.name">
                </td>
                <td>{{ player.age }}</td>
            </tr>
            </tbody>
        </table>
        <div class="alert alert-warning" role="alert" v-if="emptyPlayers">
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
            players: [],
            loading: true,
            emptyPlayers: false,
            curSortType: 'name',
            curSortOrder: 'asc'
        }
    },
    mounted() {
        this.loadTournaments();
    },
    methods: {
        loadTournaments() {
            axios.get('/api/players')
                .then(res => {
                    this.players = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    this.emptyPlayers = true;
                })
        },
        sortPlayers(key) {
            let order = 'asc';

            if (key === this.curSortType)
                order = this.curSortOrder === 'asc' ? 'desc' : 'asc';

            this.players.sort(this.compareByProp(key, order));
        },
        compareByProp(key, order = 'asc') {
            this.curSortType = key;
            this.curSortOrder = order;

            return function innerSort(a, b) {
                let varA, varB;

                if (key.indexOf('.') !== -1)
                {
                    let keys = key.split('.');
                    let firstKey = keys.shift();

                    varA = a[firstKey];
                    varB = b[firstKey];

                    for (const curKey of keys) {
                        varA = varA[curKey];
                        varB = varB[curKey];
                    }

                    varA = (typeof varA === 'string') ? varA.toUpperCase() : varA;
                    varB = (typeof varB === 'string') ? varB.toUpperCase() : varB;
                }
                else
                {
                    if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key))
                        return 0;

                    varA = (typeof a[key] === 'string') ? a[key].toUpperCase() : a[key];
                    varB = (typeof b[key] === 'string') ? b[key].toUpperCase() : b[key];
                }


                let comparison = 0;

                if (varA > varB)
                    comparison = 1;
                else if (varA < varB)
                    comparison = -1;

                return (
                    (order === 'desc') ? (comparison * -1) : comparison
                );
            };
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
    cursor: pointer;
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

.player-name{
    font-size: 16px;
    font-weight: 600;
}

.class-logo img{
    max-height: 30px;
}
</style>
