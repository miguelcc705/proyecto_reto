<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <a class="breadcrumb-item" href="consultarPacientes">Pacientes</a>
        <span class="breadcrumb-item active">Agregar paciente</span>
    </nav>
    <div class="container">
        <div class="px-5 py-5 px-md-5 text-center text-lg-start">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Agregar paciente</h4>
                    <br>
                    <hr class="my-2">
                    <br>
                    <p class="card-text">Ingrese la información:</p>
                    <form v-on:submit.prevent="agregarPaciente">
                        <div class="form-row">
                            <div class="col">
                                <label for="nombre">Ingrese los nombres</label>
                                <input type="text" class="form-control" placeholder="Nombres" v-model="paciente.nombres" name="nombres" id="nombres" required>
                            </div>
                            <div class="col">
                                <label for="apellido">Ingrese los apellidos</label>
                                <input type="text" class="form-control" placeholder="Apellidos" v-model="paciente.apellidos" name="apellidos" id="apellidos" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="documento">Ingrese el documento de identidad</label>
                                <input type="number" class="form-control" placeholder="Documento" v-model="paciente.documento" name="documento" id="documento" required>
                            </div>
                            <div class="col">
                                <label for="eps">Ingrese la EPS</label>
                                <input type="text" class="form-control" placeholder="EPS" v-model="paciente.eps" name="eps" id="eps" required>
                            </div>
                        </div>
                        <br>

                        <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="edad">Ingrese la edad</label>
                                <input type="number" class="form-control" placeholder="Edad" v-model="paciente.edad" name="edad" id="edad" required>
                            </div>
                            <div class="col">
                                <label for="sexo">Ingrese el sexo</label>
                                <input type="text" class="form-control" placeholder="sexo" v-model="paciente.sexo" name="sexo" id="sexo" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="btn-group mr-2">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                            <div class="btn-group mr-2">
                            <a href="/consultarPacientes" class="btn btn-dark">Cancelar</a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>



<script>

export default {
    data() {
        if(localStorage.getItem('user_token')){
            return {
                paciente: {} 
            }
        }else{
            window.location.href='inicioSesion'
        }
        
    },
    methods: {
        agregarPaciente() {
            var datosEnviar = {nombres: this.paciente.nombres, apellidos: this.paciente.apellidos, documento: this.paciente.documento, eps: this.paciente.eps,edad: this.paciente.edad,sexo: this.paciente.sexo}
            fetch('http://localhost/proyecto_reto/?insertar_pac=' + 1, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            }) 
            .then(respuesta => respuesta.json())
            window.location.href = 'consultarPacientes'
        }
    }
}
</script>