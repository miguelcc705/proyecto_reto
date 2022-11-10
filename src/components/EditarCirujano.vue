<template>
    <div class="container">
        <h2> Nuevo cirujano </h2>
        <form v-on:submit.prevent="editarCirujano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" v-model="cirujano.nombres" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" v-model="cirujano.apellidos" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="documento">Documento</label>
                    <input type="text" class="form-control" id="documento" v-model="cirujano.documento" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" class="form-control" id="especialidad" v-model="cirujano.especialidad" required>
                </div>      
                </div>       
            <div class="row">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="btn-group mr-2">
                    <router-link :to="{name:'ConsultarCirujano'}" class="btn btn-dark">Cancelar</router-link>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        return {
            cirujano: {} 

        }
    },
    /*created:function(){
        if(localStorage.getItem('user_token')){
            this.cargarDatos();
            this.consultarCirujanos();
        }else{
            window.location.href='inicioSesion'
        }
        
    },
*/

    methods: {

        consultarCirujanos() {
            fetch('http://http://localhost/proyecto_reto/?cirujanos=1') //
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log(datosRespuesta)
                    this.cirujanos = []
 
                    if (typeof datosRespuesta[0].success == 'undefined') {
                        this.cirujanos = datosRespuesta;
                    }
                })
                .catch(console.log)
        },
        cargarDatos() {
            fetch('http://http://localhost/proyecto_reto/consultar_cir=' + this.$route.params.idcirujanos)
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log(datosRespuesta)
                    this.cirujano = datosRespuesta[0]
                })
                .catch(console.log)
        },
        actualizarCirujano() {
            console.log(this.cirujano);

            var datosEnviar = {
                idcirujanos: this.$route.params.idcirujanos,
                nombre: this.cirujano.nombres,
                apellidos: this.cirujano.apellidos,
                documento: this.cirujano.documento,
                especialidad: this.cirujano.especialidad,
            }

            fetch('http://http://localhost/proyecto_reto/actualizar_cir=' + this.$route.params.idcirujanos, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log(datosRespuesta)
                    window.location.href = '../consultarcirujano'
                })
        }
    }
}
</script>