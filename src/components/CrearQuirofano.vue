<template>
    <nav class="breadcrumb">
        <a class="breadcrumb-item" href="/">Calendario</a>
        <a class="breadcrumb-item" href="Consultarquirofanos">Quirófanos</a>
        <span class="breadcrumb-item active">Agregar quirófano</span>
    </nav>
    <div class="container">
        <h2> Nuevo quirofano </h2>
        <form v-on:submit.prevent="Crearquirofano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="sala">Sala</label>
                    <input type="text" class="form-control" id="sala" v-model="quirofano.sala" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo</label>
                    <select id="tipo" class="form-control" v-model="quirofano.tipo" name="tipo" required>
                        <option>Electiva</option>
                        <option>Emergencias</option>
                        <option>Urgencias</option>
                    </select>
                </div>
            </div>       
            <div class="row">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
                <div class="btn-group mr-2">
                <a href="/Consultarquirofanos" class="btn btn-dark">Cancelar</a> 
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
                quirofano: {} 
            }
        }else{
            window.location.href='inicioSesion'
        }
        // return {
        //     quirofano: {} 
        // }
    },
    
    methods: {
        Crearquirofano() {               
             var datosEnviar = {
                sala: this.quirofano.sala,
                tipo: this.quirofano.tipo,
            }
            
            fetch('http://localhost/proyecto_reto/?insertar_quirofanos=' + 1, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
            .then(respuesta => respuesta.json())
            window.location.href = 'consultarquirofanos'
   
        }
    }
}
</script>