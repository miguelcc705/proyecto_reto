<template>
<head>
    <h1> Prueba 2</h1>
    </head>
    <body>

    <div class="container">
        <h2> Nuevo quirófano </h2>
        <form v-on:submit.prevent="CrearQuirofano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="Tipo">Tipo</label>
                    <input type="text" class="form-control" v-model="quirofano.tipo" id="tipo" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Nomenclatura">Nomenclatura</label>
                    <input type="text" class="form-control" v-model="quirofano.nomenclatura" id="nomenclatura" required>
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
        CrearQuirofano() {               
                
        }
    }*/
}
</script-->