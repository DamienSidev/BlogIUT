import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction'
import frLocale from '@fullcalendar/core/locales/fr';
import axios from "axios";
import toastr from 'toastr';

let calendarEl = document.getElementById('calendar');
let calendar = new Calendar(calendarEl, {
    locales: [ frLocale ],
    locale: 'fr', // the initial locale. if not specified, uses the first one
    plugins: [ timeGridPlugin, dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGrid,dayGridMonth,timeGridWeek,listWeek'
    },
    events: '/planning/events',
    dateClick: function(info) {
        location.href = '/event/new?date=' + info.dateStr.split('+')[0]
    },
    edit:'/edit/{id}',
    eventClick : function (info){
        location.href = '/edit/'
    },

    editable: true,
    eventDrop: function(info) {
        const event = info.event;
        const newDate = event.startStr
        const id = event.id
        const params = new FormData()
        params.append('newdate', newDate);
        axios.post('/event/change/date/' + event.id, params).then(response => {
            if (response.status === 200) {
                toastr[response.data.type](response.data.message);
            }
        })
    }
    // events: [
    //     {
    //         title: 'Event1',
    //         start: '2025-10-13'
    //     },
    //     {
    //         title: 'Event2',
    //         start: '2025-10-14'
    //     }
    // ],
});
calendar.render();
