<template>
    <body>

    <div class="container">
        <h2> Nuevo quirófano </h2>
        <form v-on:submit.prevent="CrearQuirofano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Tipo">Tipo</label>
                    <input type="text" class="form-control" id="tipo" required> <!-- v-model="quirofano.tipo" -->
                </div>
                <div class="form-group col-md-6">
                    <label for="Nomenclatura">Nomenclatura</label>
                    <input type="text" class="form-control" id="nomenclatura" required><!--  v-model="quirofano.nomenclatura" -->
                </div>   
            </div>       
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
    </body>
</template>

<script>
/*
export default {
    data() {
        return {
            quirofano: {} 
        }
    },
    
    methods: {
        CrearQuirofano() {               
                var datosEnviar = {
                nombre: this.activo.nombre,
                marca: this.activo.marca,
                modelo: this.activo.modelo,
                serial: this.activo.serial,
                area: this.activo.area,
                nom_resp: this.activo.nom_resp,
                doc_resp: this.activo.doc_resp
            }
            //http://localhost/practica2/?insertar=1
            fetch('http://localhost/practica2/practica_2/?insertar=0', {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
                .then(respuesta => respuesta.json())
            window.location.href = 'consultaractivo'
        }
    }
}
*/
</script>