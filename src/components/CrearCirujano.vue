<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <a class="breadcrumb-item" href="ConsultarCirujanos">Cirujanos</a>
        <span class="breadcrumb-item active">Agregar cirujano</span>
    </nav>
    <div class="container">
        <h2> Nuevo cirujano </h2>
        <form v-on:submit.prevent="CrearCirujano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" v-model="cirujano.nombres" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" v-model="cirujano.apellidos" required>
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
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                    <div class="btn-group mr-2">
                    <a href="/ConsultarCirujanos" class="btn btn-dark">Cancelar</a> 
                    </div>
                </div>
        </form>
    </div>
</template>

<script>

export default {
    data() {
        if(localStorage.getItem('user_token')){
            return {
                cirujano: {} 
            }
        }else{
            window.location.href='inicioSesion'
        }
        // return {
        //     cirujano: {} 
        // }
    },
    
    methods: {
        CrearCirujano() {               
             var datosEnviar = {
                nombres: this.cirujano.nombres,
                apellidos: this.cirujano.apellidos,
                documento: this.cirujano.documento,
                especialidad: this.cirujano.especialidad
            }
            
            fetch('http://localhost/proyecto_reto/?insertar_cir=' + 1, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
            .then(respuesta => respuesta.json())
            window.location.href = 'ConsultarCirujanos'
   
        }
    }
}
</script>