import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction'

let calendarEl = document.getElementById('calendar');
let calendar = new Calendar(calendarEl, {
    plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
    },
    events: '/planning/events',
    dateClick: function(info) {
        location.href = '/event/new?date=' + info.dateStr.split('+')[0]
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
