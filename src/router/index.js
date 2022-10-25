



import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

import Index_calendario from '../components/Index_calendario.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },

  {
    path: '/index_calendario',
    name: 'Index_calendario',
    component: Index_calendario
  },

  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
