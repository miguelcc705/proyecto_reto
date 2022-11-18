<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <h2>Listado de quirofanos</h2>
                <router-link class="btn btn-primary" :to="{name:'Crearquirofano'}"><i class="fa fa-square-plus"></i> Agregar quirofano</router-link>
                </div>
                
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sala</th>
                            <th>Tipo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="quirofano in quirofanos" :key="quirofano.idquirofanos">
                            <td>{{quirofano.idquirofanos}}</td>
                            <td>{{quirofano.sala}}</td>
                            <td>{{quirofano.tipo}}</td>
                            <td> 
                                <div class="button-group" role="group" aria-label="">
                                <router-link :to="{path: '/editarquirofano/'+ quirofano.idquirofanos} " class="btn" ><i class="fa fa-pencil"></i></router-link>
                                <button class="btn" @click="btnBorrar(quirofano.idquirofanos)"><i class="fa fa-trash"></i></button>
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
            quirofanos:[] 
        }
        
    },

    created:function(){
        if(localStorage.getItem('user_token')){
            this.Consultarquirofanos();
        }else{
            window.location.href='inicioSesion'
        }
    },
    // created:function(){
    //     this.Consultarquirofanos();
    // },

    methods:{
        Consultarquirofanos(){
            fetch('http://localhost/proyecto_reto/?quirofanos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.quirofanos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.quirofanos = datosRespuesta;
                }
            })
            .catch(console.log)
        },

        btnBorrar: function(idquirofanos){
            Swal.fire({
                title:'¿Está seguro de borrar el quirofano '+idquirofanos+"?",
                type:'warning',
                showCancelButton: true,
                confirmButtonColor:'#d33',
                cancelButtonColor:'#3085d6',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value){
                    this.borrarQuirofano(idquirofanos);
                    Swal.fire('El registro ha sido borrado')
                }
            })
        },
        borrarQuirofano(idquirofanos){
            fetch('http://localhost/proyecto_reto/?borrar_quirofano='+idquirofanos)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                window.location.href='consultarquirofanos'
            })
        }
    }
}
</script>
