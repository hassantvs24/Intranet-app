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

document.addEventListener("DOMContentLoaded", function() {
    let calendarEl = document.getElementById("calendar");
    var board_id = $('#board_id').val();
    if (!!calendarEl) {
        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin],
            editable: false,
            events: `/api/eventsbyboard/${board_id}`,
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay"
            }
        });
        calendar.render();
    }
});
