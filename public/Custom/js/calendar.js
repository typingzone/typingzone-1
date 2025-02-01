document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: notes,
        eventClick: function(info) {
            var title = info.event.title;
            var note = info.event.extendedProps.note;
            
            toastr.info(note, title);
        }
    });

    calendar.render();
});
