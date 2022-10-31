<script setup>
// import Index_calendario from './components/Index_calendario.vue'
import InicioSesion from './components/InicioSesion.vue'
//import CrearCirujano from './components/CrearCirujano.vue'
//import CrearQuirofano from './components/CrearQuirofano.vue'
</script>


<template>
  <!-- <Index_calendario /> -->
  <InicioSesion/>
  <!--CrearCirujano/-->
  <!-- CrearQuirofano /-->
  <footer class="bg-secondary text-center text-white fixed-bottom" >
    <div class="text-center p-3">
      QuiroEfficient App
      <br>
      Dashboard para gestión de quirófanos
    </div>
</footer>
</template>




<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
