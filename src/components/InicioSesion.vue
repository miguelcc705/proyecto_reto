<template>
    <html lang="es">
    <head>
    </head>
    <body>
      <div class="px-5 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
          <div class="card-deck">
            <div class="card">
              <div class="card-body">
                  <div class="container">
                    <!-- <h1 class="display-6">QuiroEfficientApp</h1> -->
                    
                    
                    <div class="d-flex align-items-center justify-content-center">
                      <img alt="Logo" src="../assets/LogoQEA.png">
                    </div>
                    <h4 class="display-6">Dashboard para gestión de quirófanos</h4>
                    <hr class="my-2">
                    <br>
                    <p class="lead">En esta aplicación podrá organizar el tiempo de uso de los quirófanos de la institución de la
                manera más eficiente posible. </p>
                    <br>
                    <lu>Programe cirugías </lu> <lu class="lead"> | </lu>
                    <lu> Realice seguimiento a los procedimientos </lu> <lu class="lead"> | </lu>
                    <lu> Consulte los indicadores de eficiencia</lu> 
                    <br>
                  </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Inicie sesión</h4>
                
                <div class="d-flex align-items-center justify-content-center">
                  <img src="https://www.pngkey.com/png/detail/353-3533105_tsp-icons-doctors-doctors-icon.png"
                      class="img-fluid" alt="Sample image">
                </div>
                <hr class="my-2">
                <form name="form" id="form" v-on:submit.prevent="login">
                    <!-- Email input -->
                    <div class="container-fluid">
                      <div class="form-outline mb-4">
                        <br>
                        <input name="email" type="email" id="form2Example1" class="form-control" v-model="usuario.email"/> 
                        <label class="form-label" for="form2Example1">Correo institucional</label>
                      </div>
                    
                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <input name="passwd" type="password" id="form2Example2" class="form-control" v-model="usuario.passwd"/> 
                        <label class="form-label" for="form2Example2">Contraseña</label>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <button class="btn btn-primary" type="submit" >Ingresar</button>
                    </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
</template>
  
  
<script>
  
  import axios from "axios";
  
  export default {
    data() {
        return {
          usuario:{} 
        }
    },
  
    methods: {
  
        login() {
            
            axios.get("http://localhost/practica2/practica_2/index.php?email="+this.usuario.email+"&passwd="+this.usuario.passwd)
            .then((result)=>{
                if(result.status == 200){
                  if(result.data[0].email ==this.usuario.email){
                    localStorage.setItem('user_token',result.data[0].token);
                    localStorage.setItem('user_name',result.data[0].name);
                    window.location.href='/'
                  }else{
                    window.location.href='inicioSesion'
                  }
                }
                
            })
        }
    }
  }
</script>