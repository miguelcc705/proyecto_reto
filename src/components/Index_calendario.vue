<script setup>
import { reactive } from 'vue'
import '@fullcalendar/core/vdom'
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'
import $ from 'jquery'

const id = 10//ref(10)

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

        const cal = arg.view.FullCalendarcal.unselect()
        cal.newEvent({
            id: `${id.value}`,
            title: `New event ${id.value}`,
            start: arg.start,
            end: arg.end,
            allDay: true
        })
    },
    dateClick:(info) => {
        $("#evento").modal("show");
        console.log(info)
    },

    eventClick: (arg) => {
        console.log(arg.event.title)
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
        <FullCalendar v-bind:options="options" />
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#evento">
        Launch
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>




</template>