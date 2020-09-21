require('./bootstrap');
/**
 * init calendar widget
 * @type Calendar
 */
// window.Calendar = require('@fullcalendar/core')
// window.dayGridPlugin = require('@fullcalendar/daygrid')``
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
// import interactionPlugin from '@fullcalendar/interaction';

// this data will come from backend
const EVENTS = [
    {
        id: "a",
        title: "my event",
        start: "2020-08-08"
    },
    {
        id: "b",
        title: "my event2",
        start: "2020-08-12"
    },
    {
        id: "c",
        title: "my event2",
        start: "2020-08-12"
    },
    {
        id: "d",
        title: "cool event",
        start: "2020-08-15"
    },
    {
        id: "e",
        title: "Kekw 3",
        start: "2020-08-15"
    }
];

document.addEventListener("DOMContentLoaded", function() {
    let calendarEl = document.getElementById("calendar");
    if (!!calendarEl) {
        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin],
            editable: false,
            events: EVENTS,
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay"
            }
        });
        calendar.render();
    }
});
