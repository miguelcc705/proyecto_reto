

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
    <nav class="navbar navbar-expand-lg" style="background-color: #FEFEFE;">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <button type="button" style="background-color: #020E27;" class="btn btn-light dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false">
                        <a class="text" style="color:#FEFEFE">Menu</a>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Ingreso información</a>
                        <a class="dropdown-item" href="#">Calendario</a>
                        <a class="dropdown-item" href="#">Indicadores</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div>
        <FullCalendar v-bind:options="options" @dateClick="opendateClick" />
    </div>



    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Programacion</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Informacion Cirugia</h4>
                    <form action="" id="form" v-on:submit.prevent="agregarCirugia">
                        <label for="sel1">Cirujanos:</label>
                        <select class="form-control" name="sel1" id="sel1" v-model="cirugia.sel1">
                            <option>C1</option>
                            <option>C2</option>
                            <option>C3</option>
                            <option>C4</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control rounded-0" name="descripcion" id="descripcion"
                                rows="3" v-model="cirugia.descripcion"></textarea>
                        </div>
                        <br>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">ID paciente</span>
                            </div>
                            <input type="text" class="form-control" id="Id" name="id" v-model="cirugia.id">
                        </div>
                        <br>
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                            <input type="text" class="form-control" id="nombre" name="nombre" v-model="cirugia.nombre">
                        </div>

                        <div class="form-group">
                            <label for="start">start</label>
                            <input type="text" class="form-control" id="start" name="start" v-model="cirugia.start">
                        </div>

                        <div class="form-group">
                            <label for="end">end</label>
                            <input type="text" class="form-control" id="end" name="end" v-model="cirugia.end">
                        </div>


                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


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
                cirugia: {}
            }
        } else {
            window.location.href = 'inicioSesion'
        }

    },
    created: function () {

    },

    methods: {
        agregarCirugia() {
            var datosEnviar = {
                Cirujano: this.cirugia.sel1,
                Descripcion: this.cirugia.descripcion,
                ID_paciente: this.cirugia.id,
                Nombre_paciente: this.cirugia.nombre,
                Strat: this.cirugia.start,
                End: this.cirugia.end,

            }.then(respuesta => respuesta.json())
             console.log(datosEnviar);
            

        }
    }
}
</script>