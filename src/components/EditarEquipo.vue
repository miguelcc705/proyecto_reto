<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <a class="breadcrumb-item" href="consultarequipo">Equipos</a>
        <span class="breadcrumb-item active">Editar kit</span>
    </nav>
    <div class="container">
        <div class="px-5 py-5 px-md-5 text-center text-lg-start">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Actualizar equipo</h4>
                    <br>
                    <hr class="my-2">
                    <br>
                    <p class="card-text">Ingrese la información:</p>
                    <form v-on:submit.prevent="actualizarEquipo">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    v-model="equipo.nombre" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" id="cantidad"
                                    v-model="equipo.cantidad" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="btn-group mr-2">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                            <div class="btn-group mr-2">
                                <a href="/consultarequipo" class="btn btn-secondary">Cancelar</a>
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
        return {
            equipo: {}
        }
    },
    created: function () {
        if (localStorage.getItem('user_token')) {
            this.consultarEquipoID();
        } else {
            window.location.href = 'inicioSesion'
        }
    },
    methods: {
        consultarEquipoID() {
            fetch('http://localhost/proyecto_reto/?consultar_eq=' + this.$route.params.idequipos) //
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log("...1")
                    console.log(datosRespuesta)
                    this.equipo = datosRespuesta[0]
                    console.log(this.equipo)
                })
                .catch(console.log)
        },
        actualizarEquipo() {
            var datosEnviar = { idequipos: this.$route.params.idequipos, nombre: this.equipo.nombre, cantidad: this.equipo.cantidad}
            fetch('http://localhost/proyecto_reto/?actualizar_eq=' + this.$route.params.idequipos, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log("ACTUALIZAR")
                    console.log(datosRespuesta)
                    window.location.href = '../consultarequipo'
                })
        }
    }
}
</script>