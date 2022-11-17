<template>
    <div class="container">
        <div class="px-5 py-5 px-md-5 text-center text-lg-start">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Agregar equipo</h4>
                    <br>
                    <hr class="my-2">
                    <br>
                    <p class="card-text">Ingrese la información:</p>
                    <form v-on:submit.prevent="agregarEquipo">
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
                        <div class="form-row">
                            <div class="btn-group mr-2">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
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
        if (localStorage.getItem('user_token')) {
            return {
                equipo: {}
            }
        } else {
            window.location.href = 'inicioSesion'
        }

    },
    methods: {
        agregarEquipo() {
            var datosEnviar = { nombre: this.equipo.nombre, cantidad: this.equipo.cantidad}
            fetch('http://localhost/proyecto_reto/?insertar_eq=' + 1, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
                .then(respuesta => respuesta.json())
            window.location.href = 'consultarequipo'
        }
    }
}
</script>