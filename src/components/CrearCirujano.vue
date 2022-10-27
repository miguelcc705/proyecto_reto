<template>
<head>
    <h1> Prueba </h1>
    </head>
    <body>

    <div class="container">
        <h2> Nuevo cirujano </h2>
        <form v-on:submit.prevent="CrearCirujano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" v-model="cirujano.nombre" id="nombre" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">Apellidos</label>
                    <input type="text" class="form-control" v-model="cirujano.apellido" id="apellido" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="documento">Documento</label>
                    <input type="text" class="form-control" v-model="cirujano.documento" id="documento" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" class="form-control" v-model="cirujano.especialidad" id="especialidad" required>
                </div>      
                </div>       
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
    </body>
</template>

<!--script>

export default {
    /*data() {
        return {
            cirujano: {} 
        }
    },
    
    methods: {
        CrearCirujano() {               
                
        }
    }*/
}
</script-->