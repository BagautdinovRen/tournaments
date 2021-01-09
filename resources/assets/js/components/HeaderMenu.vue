<template>
    <ul class="navbar-nav mr-auto">
        <li v-for="link in links" class="nav-item">
            <router-link class="nav-link" :to="link.href">{{ link.title }}</router-link>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        links: Array,
    },
    data() {
        return {

        }
    }
}
</script>

<style scoped>
    .nav-link{
        color: #fff;
    }
</style>
