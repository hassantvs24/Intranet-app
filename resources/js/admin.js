require("./bootstrap");

/*===================================
Full calender implementation
===================================*/
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
    if (!!calendarEl) {
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
    }
});

/*===================================================================
   On group select show relevant admins
====================================================================*/
document.addEventListener("DOMContentLoaded", function() {
    const primary_contacts_wrap = $('#primary-contacts-wrap')

    if (!!primary_contacts_wrap) {
        $(".select-group-btn input[name='user_group']").change(function () {
            // get selected group id
            let group_id = $(this).val()
            // clear old req data
            let admins_html = ``
            // get new data
            axios.get('/api/group/'+ group_id +'/contacts')
                .then(function (response) {
                    // console.log( (response.data.data))
                    let data = response.data.data
                    // prepare html
                    data.forEach((admin) => {
                    console.log(admin.name)
                    admins_html += `
                        <div class="custom-control custom-radio w-100">
                            <input type="radio" class="custom-control-input" name="group_admins" id="group_admin_${admin.id}" value="${admin.id}">
                            <label class="custom-control-label" for="group_admin_${admin.id}">${admin.name}</label>
                        </div>
                    `
                })
                // console.log(admins_html)
                // clear DOM -> remove old group admins
                primary_contacts_wrap.html('')
                // set html in DOM
                primary_contacts_wrap.html(admins_html)
            })
        })
    } // execute this block only if primary-contact div is found

    // init tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
})
