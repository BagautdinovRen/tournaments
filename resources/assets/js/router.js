import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Main from './views/Main';
import Layout from './views/Layout';
import Login from './views/Login';
import Register from './views/Register';
import TournamentList from './views/TournamentList';
import Tournament from './views/Tournament';
import Player from './views/Player';

const routes = [
    {
        path: '',
        component: Layout,
        children: [
            {
                path: '/',
                component: Main
            },
            {
                path: '/login',
                component: Login
            },
            {
                path: '/register',
                component: Register
            },
            {
                path: '/tournaments',
                component: TournamentList
            },
            {
                path: '/tournaments/:id',
                component: Tournament
            },
            {
                path: '/player/:id',
                component: Player
            },
        ]
    },

];

export default new vueRouter({
    mode: 'history',
    routes
});
