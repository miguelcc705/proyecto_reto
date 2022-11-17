import { createRouter, createWebHistory } from 'vue-router'
import InicioSesion from '../components/InicioSesion.vue'
// import HomeView from '../views/HomeView.vue'

import ConsultarCirujanos from '../components/ConsultarCirujano.vue'
import CrearCirujano from '../components/CrearCirujano.vue'
import EditarCirujano from '../components/EditarCirujano.vue'

import Consultarquirofanos from '../components/ConsultarQuirofano.vue'
import Crearquirofano from '../components/CrearQuirofano.vue'
import Editarquirofano from '../components/EditarQuirofano.vue'

import ConsultarPaciente from '../components/ConsultarPaciente.vue'
import CrearPaciente from '../components/CrearPaciente.vue'
import EditarPaciente from '../components/EditarPaciente.vue'

import Index_calendario from '../components/Index_calendario.vue'

const routes = [
  {
    path: '/inicioSesion',
    name: 'inicioSesion',
    component: InicioSesion
  },
  // {
  //   path: '/',
  //   name: 'home',
  //   component: HomeView
  // },
  {
    path: '/consultarcirujanos',
    name: 'ConsultarCirujanos',
    component: ConsultarCirujanos
  },
  {
    path: '/crearcirujano',
    name: 'CrearCirujano',
    component: CrearCirujano
  },
  {
    path: '/editarcirujano/:idcirujanos',
    name: 'EditarCirujano',
    component: EditarCirujano
  },
  {
    path: '/crearquirofano',
    name: 'Crearquirofano',
    component: Crearquirofano
  },
  {
    path: '/consultarquirofanos',
    name: 'Consultarquirofanos',
    component: Consultarquirofanos
  },
  {
    path: '/editarquirofano/:idquirofanos',
    name: 'Editarquirofano',
    component: Editarquirofano
  },
  {
    path: '/consultarPacientes',
    name: 'ConsultarPaciente',
    component: ConsultarPaciente
  },
  {
    path: '/crearpaciente',
    name: 'CrearPaciente',
    component: CrearPaciente
  },
  {
    path: '/editarpaciente/:idpacientes',
    name: 'EditarPaciente',
    component: EditarPaciente
  },
  {
    path: '/',
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
