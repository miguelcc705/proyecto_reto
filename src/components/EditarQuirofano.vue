<template>
    <div class="container">
        <h2> Editar quirofano </h2>
        <form v-on:submit.prevent="actualizarQuirofano">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="sala">Sala</label>
                    <input type="text" class="form-control" id="sala" name="sala" v-model="quirofano.sala" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo</label>
                    <select  class="form-control" id="tipo"  name="tipo" v-model="quirofano.tipo" required>
                        <option>Electiva</option>
                        <option>Emergencias</option>
                        <option>Urgencias</option>
                    </select>
                </div>
            </div>       
            <div class="row">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                <div class="btn-group mr-2">
                    <router-link :to="{name:'Consultarquirofanos'}" class="btn btn-dark">Cancelar</router-link>
                </div>
            </div>
        </form>
    </div>
</template>
<script>

export default {
    data() {
        return {
            quirofano: {} 

        }
    },

    //    created:function(){
    //     this.cargarDatos();
    //     this.consultarQuirofanos();
    // },

    created:function(){
        if(localStorage.getItem('user_token')){
            this.cargarDatos();
            //this.consultarCirujanos();
        }else{
            window.location.href='inicioSesion'
        }
        
    },


    methods: {

        // consultarQuirofanos(){
        //     fetch('http://localhost/proyecto_reto/?quirofanos=1') 
        //     .then(respuesta=>respuesta.json())
        //     .then((datosRespuesta)=>{
        //         //console.log(datosRespuesta)
        //         this.quirofanos=[]
        //         if(typeof datosRespuesta[0].success=='undefined'){
        //             this.quirofanos = datosRespuesta;
        //         }
        //     })
        //     .catch(console.log)
        // },

        cargarDatos() {
            fetch('http://localhost/proyecto_reto/?consultar_quirofano=' + this.$route.params.idquirofanos)
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    //console.log(datosRespuesta)
                    this.quirofano = datosRespuesta[0]
                })
                .catch(console.log)
        },
        
        actualizarQuirofano() {
            console.log(this.quirofano);

            var datosEnviar = {
                idquirofanos: this.$route.params.idquirofanos,
                sala: this.quirofano.sala,
                tipo: this.quirofano.tipo,
            }

            fetch('http://localhost/proyecto_reto/?actualizar_quirofano=' + this.$route.params.idquirofanos, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            })
                .then(respuesta => respuesta.json())
                .then((datosRespuesta) => {
                    console.log(datosRespuesta)
                    window.location.href = '../consultarquirofanos'
                })
        }
    }
}
</script>