require("./bootstrap");

/*===================================
Full calender implementation
===================================*/
let edit_calender_btn = $("#edit-calender-btn");
let save_calender_btn = $("#save-calender-btn");
(function($) {
    edit_calender_btn.click(function() {
        save_calender_btn.removeAttr("disabled", false);
        console.log("clicked");
    });
})(jQuery);

import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";

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

    let calendar = new Calendar(calendarEl, {
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
        editable: true,
        events: EVENTS,
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay"
        }
    });

    calendar.render();
    // console.log(calendar.getEvents());
});
