<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <h2>Listado de equipos</h2>
                <router-link class="btn btn-primary" :to="{name:'CrearEquipo'}"><i class="fa fa-square-plus"></i> Agregar equipo</router-link>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad </th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="equipo in equipos" :key="equipo.idequipos">
                            <td>{{equipo.idequipos}}</td>
                            <td>{{equipo.nombre}}</td>
                            <td>{{equipo.cantidad}}</td>
                            <td> 
                                <div class="button-group" role="group" aria-label="">
                                <router-link :to="{path: '/editarequipo/'+ equipo.idequipos} " class="btn" ><i class="fa fa-pencil"></i></router-link>
                                <button class="btn" @click="btnBorrar(equipo.idequipos, equipo.nombre)"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

import Swal from'sweetalert2'


export default {
        data(){
            return{
                equipos:[]
                
            }
        },
        created:function(){
            if(localStorage.getItem('user_token')){
                this.consultarEquipos();
            }else{
                window.location.href='inicioSesion'
            }
        },

    methods:{
        consultarEquipos(){
            fetch('http://localhost/proyecto_reto/?equipos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log("---1")
                console.log(datosRespuesta)
                this.equipos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.equipos = datosRespuesta;
                    console.log("---2")
                    console.log(this.equipos)  
                    
                }
            })
            .catch(console.log)
        },
        
        

        btnBorrar: function(idequipos, nombre){
            Swal.fire({
                title:'¿Está seguro de borrar el equipo: '+ nombre+"?",
                showCancelButton: true,
                confirmButtonColor:'#d33',
                cancelButtonColor:'#3085d6',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value){
                    this.borrarEquipo(idequipos);
                    
                }
            })
        },
        borrarEquipo(idequipos){
            fetch('http://localhost/proyecto_reto/?borrar_eq='+ idequipos)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                window.location.href='consultarequipo'
            })
        }
    }
}
</script>   
