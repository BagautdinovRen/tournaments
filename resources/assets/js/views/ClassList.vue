<template>
    <div>
        <spinner v-if="loading"/>
        <div class="class-list" v-else-if="!emptyClassList">
            <div class="col-md-6" v-for="characterClass in classList">
                <div class="class-list_item">
                    <div class="item__img">
                        <img :src="'/storage/' + characterClass.image" :alt="characterClass.name">
                    </div>
                    <div class="item__content">
                        <div class="item__content-title">{{ characterClass.name }}</div>
                        <div class="item__content-role">{{ characterClass.roles }}</div>
                        <div class="item__content-desc">{{ characterClass.description }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" role="alert" v-if="emptyClassList">
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
    data: () => ({
        loading: true,
        classList: [],
        emptyClassList: false
    }),
    mounted() {
        this.loadClassList();
    },
    methods: {
        loadClassList() {
            axios.get('/api/classes')
                .then(res => {
                    this.classList = res.data;
                    this.loading = false;
                })
                .catch(err => {
                    this.emptyClassList = true;
                })
        }
    },
}
</script>

<style scoped>
    .class-list{
        display: flex;
    }

    .class-list_item{
        display: flex;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .item__img{
        width: 40%;
    }

    .item__img img{
        max-width: 100%;
        height: auto;
    }

    .item__content{
        padding: 20px;
        width: 60%;
    }

    .item__content-title{
        font-size: 16px;
        font-weight: 600;
    }

    .item__content-role{
        font-size: 13px;
        padding: 10px 0;
    }

    .item__content-desc{
        color: #aaa;
    }
</style>

