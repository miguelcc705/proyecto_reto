<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <span class="breadcrumb-item active"> Cirujanos</span>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <h2>Listado de cirujanos</h2>
                <router-link class="btn btn-primary" :to="{name:'CrearCirujano'}"><i class="fa fa-square-plus"></i> Agregar cirujano</router-link>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Especialidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cirujano in cirujanos" :key="cirujano.idcirujanos">
                            <td>{{cirujano.idcirujanos}}</td>
                            <td>{{cirujano.nombres}}</td>
                            <td>{{cirujano.apellidos}}</td>
                            <td>{{cirujano.documento}}</td>
                            <td>{{cirujano.especialidad}}</td>
                            <td> 
                                <div class="button-group" role="group" aria-label="">
                                <router-link :to="{path: '/editarcirujano/'+ cirujano.idcirujanos} " class="btn" ><i class="fa fa-pencil"></i></router-link>
                                <button class="btn" @click="btnBorrar(cirujano.idcirujanos)"><i class="fa fa-trash"></i></button>
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
            cirujanos:[] 
        }
        
    },

    created:function(){
        if(localStorage.getItem('user_token')){
            this.ConsultarCirujanos();
        }else{
            window.location.href='inicioSesion'
        }
    },
    // created:function(){
    //     this.ConsultarCirujanos();
    // },

    methods:{
        ConsultarCirujanos(){
            fetch('http://localhost/proyecto_reto/?cirujanos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.cirujanos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.cirujanos = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        
        btnBorrar: function(idcirujanos){
            Swal.fire({
                title:'¿Está seguro de borrar el registro: #'+idcirujanos+"?",
                type:'warning',
                showCancelButton: true,
                confirmButtonColor:'#d33',
                cancelButtonColor:'#3085d6',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value){
                    this.borrarCirujano(idcirujanos);
                    Swal.fire('El registro ha sido borrado')
                }
            })
        },
        borrarCirujano(idcirujanos){
            fetch('http://localhost/proyecto_reto/?borrar_cir='+idcirujanos)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                window.location.href='ConsultarCirujanos'
            })
        }
    }
}
</script>
