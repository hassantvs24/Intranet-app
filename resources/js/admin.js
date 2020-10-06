require("./bootstrap");

/*===================================
Full calender implementation
===================================*/
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin from "@fullcalendar/interaction";
import Swal from 'sweetalert2';

document.addEventListener("DOMContentLoaded", function() {
    const targetNode = document.getElementById('data-cards-wrap');
    const config = { attributes: true, childList: true, subtree: true };
    // Callback function to execute when mutations are observed
    const callback = function(mutationsList, observer) {
        // Use traditional 'for loops' for IE 11
        for(let mutation of mutationsList) {
            if (mutation.type === 'childList' || mutation.type === 'attributes') {
                init_full_calendar()
            }
        }
    };
    // Create an observer instance linked to the callback function
    const observer = new MutationObserver(callback);
    // Start observing the target node for configured mutations
    if (!!targetNode) {
        observer.observe(targetNode, config);
    }

    function formatDate( date ) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    function init_full_calendar() {
        let calendarEl = document.getElementById("calendar");
        if (!!calendarEl) {
            var board_id = $('#board_id').val()
            let calendar = new Calendar(calendarEl, {
                plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
                editable: true,
                events: `/api/eventsbyboard/${board_id}`,
                // events: EVENTS,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay"
                },
                lazyFetching: true,
                displayEventTime: true,
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    $('#fullCalModal').modal();
                    $('#event_start').val(start.startStr);
                    $('#event_end').val(start.endStr);
                },
                eventDrop:function(event) {
                    var    id    = event.event.id;
                    console.log(event.event.start);
                    let    data  = {
                        "start_date" : formatDate(event.event.start),
                        "end_date"   : formatDate(event.event.end),
                        "title" :       event.event.title,
                        "board_id" : board_id
                    };

                    axios.put(`/api/events/${id}`, data)
                        .then(function (response) {

                        })
                        .catch(function (error) {

                        });
                },
                eventClick: function( event ) {
                    var    id    = event.event.id;

                    Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        axios.delete(`/api/events/${id}`)
                        .then(function (response) {
                            console.log(response.data.data);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                        window.location.reload();
                      }
                    })
                }
            });
            calendar.render();
            observer.disconnect();
        }
    }


    $(document).on('submit','#calenderform',function(e){
        e.preventDefault();

        var start = $('#event_start').val(),
            end   = $('#event_end').val(),
            description = $('#event_description').val(),
            title = $('#event_title').val(),
            board_id = $('#board_id').val();
        var data = {
            "start_date": start,
            "end_date": end,
            "details": description,
            "title": title,
            "board_id": board_id,
        };

        axios.post('/api/events', data)
        .then(function (response) {
            if( response.status == 200 ) {
                $('#modalmessage').text('');
                $('#modalmessage').text('Event Created');
                var data = response.data.data;
                // $('#calendar').fullCalendar('renderEvent', {
                //     title: title,
                //     start: start,
                //     allDay: true
                // });
                // console.log(response.data.data);
                // calendar.addEvent({
                //     title: data.title,
                //     start: data.start,
                //     allDay: false
                // });

                window.location.reload();
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    });
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
    });
})
