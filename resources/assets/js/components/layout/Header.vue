<template>
    <header class="py-3">
        <div class="container header-main">
            <div class="header-main__left">
                <div class="main-logo">
                    <router-link to="/">
                        <main-logo/>
                    </router-link>
                </div>
                <div class="header-menu">
                    <nav class="navbar navbar-expand-lg">
                        <header-menu :links="links"/>
                    </nav>
                </div>
            </div>
            <div class="header-main__right">
                <div class="header-search">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" :placeholder="trans.header.search_title" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ trans.header.search_title }}</button>
                    </form>
                </div>
                <div class="profile-links">
                    <nav class="navbar navbar-expand-lg">
                        <header-menu :links="profileLinks"/>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import MainLogo from "../../icons/MainLogo";
import HeaderMenu from "../HeaderMenu";

export default {
    components: {
        MainLogo,
        HeaderMenu
    },
    data() {
        return {
            links: [
                {
                    title: 'Турниры',
                    href: '/tournaments'
                },
                {
                    title: 'Участники',
                    href: '/players'
                },
                {
                    title: 'Классы',
                    href: '/classes'
                },
            ],
            profileLinks: [
                {
                    title: 'Вход',
                    href: '/login'
                },
                {
                    title: 'Регистрация',
                    href: '/register'
                },
            ]
        }
    },
}
</script>

<style scoped>
    header{
        background-color: rgba(49,53,71,.8);
    }

    .header-main{
        display: flex;
        justify-content: space-between;
    }

    .header-main__left, .header-main__right{
        display: flex;
        align-items: center;
    }

    .header-menu{
        margin-left: 20px;
    }
</style>
