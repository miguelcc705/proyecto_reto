<script setup>
import { ref, reactive } from 'vue'
import '@fullcalendar/core/vdom'
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'
import 'jquery'
import $ from 'jquery'
const id = ref(0)
const options = reactive({
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    locale: "es",
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth, dayGridWeek, listDay'
    },
    editable: true,
    selectable: true,
    weekends: true,
    select: (arg) => {
        id.value = id.value + 1
        const cal = arg.view.calendar
        cal.unselect()
        cal.addEvent({
            id: `${id.value}`,
            title: `New event ${id.value}`,
            start: arg.start,
            end: arg.end,
            allDay: true
        })
    },
    dateClick: function (clickInfo) {
        console.log(clickInfo);
        window.$('#evento').modal('show');
    },
    eventClick: (arg) => {
        console.log(arg.event.title)
        $("#evento").modal("show");
    }
})
</script>


<template>
    <br>
    <div>
        <FullCalendar v-bind:options="options" @dateClick="opendateClick" />
    </div>

    <!-- CREAR CIRUGIA -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Programación de cirugía</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form v-on:submit.prevent="agregarCirugia">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" v-model="cirugia.fecha">
                                <br>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <h6>Tiempo estimado</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="horaInicio">Hora inicio</label>
                                    <input type="time" class="form-control" id="horaInicio" v-model="cirugia.horaInicio">
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="horaFinal">Hora final</label>
                                    <input type="time" class="form-control" id="horaFinal"  v-model="cirugia.horaFinal">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre">Procedimiento</label>
                                    <input type="text" class="form-control" id="nombre"  v-model="cirugia.nombre" required>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="idpacientes">Paciente:</label>
                                    <select class="form-control" name="idpacientes" id="idpacientes" v-model="cirugia.idpacientes">
                                        <option v-for="paciente in pacientes" :value="paciente.idpacientes" :key="paciente.idpacientes">{{paciente.documento}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="idcirujanos">Cirujano:</label>
                                    <select class="form-control" name="idcirujanos" id="idcirujanos" v-model="cirugia.idcirujanos">
                                        <option v-for="cirujano in cirujanos" :value="cirujano.idcirujanos" :key="cirujano.idcirujanos">{{cirujano.nombres}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <label for="idquirofanos">Quirófano:</label>
                                    <select class="form-control" name="idquirofanos" id="idquirofanos" v-model="cirugia.idquirofanos">
                                        <option v-for="quirofano in quirofanos" :value="quirofano.idquirofanos" :key="quirofano.idquirofanos">{{quirofano.sala}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="container-fluid">
                            <h6>Equipos e instrumentos</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="idequipos" id="idequipos" v-model="cirugia.idequipos">
                                        <option v-for="equipo in equipos" :value="equipo.idequipos" :key="equipo.idequipos">{{equipo.nombre}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ml-6">
                                    <button class="btn btn-primary">Kit faltante</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="detalles">Detalles</label>
                            <textarea class="form-control rounded-0" name="detalles" id="detalles"
                                rows="3" v-model="cirugia.detalles"></textarea>
                        </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end CREAR CIRUGIA -->

</template>

<script>
export default {
    data() {
        if (localStorage.getItem('user_token')) {
            return {
                cirugia: [],
                cirujanos: [],
                pacientes: [],
                equipos: [],
                quirofanos: []
            }
        } else {
            window.location.href = 'inicioSesion'
        }
    },
    created:function(){
        this.consultarCirujanos();
        this.consultarPacientes();
        this.consultarEquipos();
        this.consultarQuirofanos();
    },
    methods: {
        consultarCirujanos(){
            fetch('http://localhost/proyecto_reto/?cirujanos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.cirujanos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.cirujanos = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        consultarPacientes(){
            fetch('http://localhost/proyecto_reto/?pacientes=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.pacientes=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.pacientes = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        consultarEquipos(){
            fetch('http://localhost/proyecto_reto/?equipos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.equipos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.equipos = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        consultarQuirofanos(){
            fetch('http://localhost/proyecto_reto/?quirofanos=1') 
            .then(respuesta=>respuesta.json())
            .then((datosRespuesta)=>{
                console.log(datosRespuesta)
                this.quirofanos=[]
                if(typeof datosRespuesta[0].success=='undefined'){
                    this.quirofanos = datosRespuesta;
                }
            })
            .catch(console.log)
        },
        agregarCirugia() {
            var datosEnviar = {
                fecha: this.cirugia.fecha,
                nombre: this.cirugia.nombre,
                horaInicio: this.cirugia.horaInicio,
                horaFinal: this.cirugia.horaFinal,
                detalles: this.cirugia.detalles,
                idquirofanos: this.cirugia.idquirofanos,
                idpacientes: this.cirugia.idpacientes,
                idcirujanos: this.cirugia.idcirujanos
            }
            fetch('http://localhost/proyecto_reto/?insertar_cirugia=' + 1, {
                method: "POST",
                body: JSON.stringify(datosEnviar)
            }).then(respuesta => respuesta.json())
            console.log(datosEnviar);
            window.location.href = '/'
            
        }
    }
}
</script>