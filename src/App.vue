<template>
  <nav class="navbar navbar-expand navbar-light bg-light ">
    <div class="nav navbar-nav">
        <router-link to="/inicioSesion">{{val2}}</router-link>
        <a href ="" v-on:click="cerrarSesion">{{val}}</a> 
    </div>
  </nav>

  <footer class="bg-secondary text-center text-white fixed-bottom" >
    <div class="text-center p-3">
      QuiroEfficient App
      <br>
      Dashboard para gestión de quirófanos
    </div>
  </footer>
  <router-view/>
</template>


<script>

export default {
  
    data() {
      if(localStorage.getItem('user_token')){
        
        this.nombre=localStorage.getItem('user_name');
        this.val='Cerrar Sesión';
      }else{
        this.val2='Iniciar Sesión'}
    },
    methods: {
        cerrarSesion() {
            localStorage.clear()
            window.location.hred='/'
        }
    }
}
</script>


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
