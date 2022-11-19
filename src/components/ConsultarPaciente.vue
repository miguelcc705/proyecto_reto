<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <span class="breadcrumb-item active"> Pacientes</span>
    </nav>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <h2>Listado de pacientes</h2>
                <router-link class="btn btn-primary" :to="{name:'CrearPaciente'}"><i class="fa fa-user-plus"></i> Agregar paciente</router-link>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>EPS</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="paciente in pacientes" :key="paciente.idpacientes">
                            <td>{{paciente.idpacientes}}</td>
                            <td>{{paciente.nombres}}</td>
                            <td>{{paciente.apellidos}}</td>
                            <td>{{paciente.documento}}</td>
                            <td>{{paciente.eps}}</td>
                            <td>{{paciente.edad}}</td>
                            <td>{{paciente.sexo}}</td>
                            <td> 
                                <div class="button-group" role="group" aria-label="">  <!-- cambiar botones-->
                                <router-link class="btn" :to="{path: '/editarpaciente/'+paciente.idpacientes}"><i class="fa fa-pencil"></i></router-link>
                                <button class="btn" @click="btnBorrar(paciente.idpacientes, paciente.nombres)"><i class="fa fa-trash"></i> </button>
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
                pacientes:[]
                
            }
        },
        created:function(){
            if(localStorage.getItem('user_token')){
                this.consultarPacientes();
            }else{
                window.location.href='inicioSesion'
            }
        },

        methods:{
            consultarPacientes(){
                fetch('http://localhost/proyecto_reto/?pacientes=1') //
                .then(respuesta=>respuesta.json())
                .then((datosRespuesta)=>{
                    console.log("---1")
                    console.log(datosRespuesta)
                    this.pacientes=[]
                    if(typeof datosRespuesta[0].success=='undefined'){
                        this.pacientes = datosRespuesta;
                        console.log("---2")
                        console.log(this.pacientes)  
                    } 
                })
                .catch(console.log)
            },
            btnBorrar: function(idpacientes, nombres){
                Swal.fire({
                    title:'¿Está seguro que desea borrar a '+nombres+" como paciente?",
                    type:'warning',
                    showCancelButton: true,
                    confirmButtonColor:'#d33',
                    cancelButtonColor:'#3085d6',
                    confirmButtonText: 'Borrar'
                }).then((result) => {
                    if (result.value){
                        this.borrarPaciente(idpacientes);
                    }
                })
            },
            borrarPaciente(idpacientes){
                fetch('http://localhost/proyecto_reto/?borrar_pac='+idpacientes)
                .then(respuesta=>respuesta.json())
                .then((datosRespuesta)=>{
                    console.log(datosRespuesta)
                    window.location.href='consultarPacientes'
                })
                Swal.fire('El paciente ha sido borrado')
            }
        }   
    }
    
</script>