<template>
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Especialidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cirujano in cirujanos" :key="cirujano.id">
                            <td>{{activo.idcirujanos}}</td>
                            <td>{{activo.nombres}}</td>
                            <td>{{activo.apellidos}}</td>
                            <td>{{activo.documento}}</td>
                            <td>{{activo.especialidad}}</td>
                            <td> 
                                <div class="button-group" role="group" aria-label="">
                                <router-link :to="{path: '/editarcirujano/'+ cirujano.idcirujanos} " class="btn" ><i class="fa fa-pencil"></i></router-link>
                                <!--button class="btn" @click="btnBorrar(cirujano.idcirujanos)"><i class="fa fa-trash"></i> </button-->
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

//import Swal from'sweetalert2'

export default {
    data(){
        return{
            cirujanos:[] 
        }
        
    },
   /*created:function(){
        if(localStorage.getItem('user_token')){
            this.consultarCirujanos();
        }else{
            window.location.href='inicioSesion'
        }
    },*/
    methods:{
        consultarCirujanos(){
            fetch('http://http://localhost/proyecto_reto/?cirujanos=0') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.cirujanos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.cirujuanos = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        /*
        borrarActivo(id){
            fetch('http://http://localhost/proyecto_reto/?borrar_cir='+id)
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                window.location.href='consultarcirujano'
            })
        },
        btnBorrar: function(id){
            Swal.fire({
                title:'¿Está seguro de borrar el registro: #'+id+"?",
                type:'warning',
                showCancelButton: true,
                confirmButtonColor:'#d33',
                cancelButtonColor:'#3085d6',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value){
                    this.borrarActivo(id);
                    Swal.fire('El registro ha sido borrado')
                }
            })
        }*/
    }
}
</script>
