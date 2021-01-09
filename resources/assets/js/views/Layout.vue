<template>
    <div class="main-wrapper">
        <app-header/>
        <main>
            <div class="container">
                <router-view :key="$route.path"></router-view>
            </div>
        </main>
        <app-footer/>
    </div>
</template>

<script>
import AppHeader from '../components/layout/Header';
import AppFooter from '../components/layout/Footer';

export default {
    components: {
        AppHeader,
        AppFooter
    }
}
</script>

<style scoped>
    main{
        margin-top: 30px;
    }
</style>
