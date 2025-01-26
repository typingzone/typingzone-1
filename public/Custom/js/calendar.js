
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Event 1',
                start: '2025-01-10',
            },
            {
                title: 'Event 2',
                start: '2025-01-15',
            },
            {
                title: 'Meeting',
                start: '2025-01-22T14:30:00',
            },
        ],
    });

    calendar.render();
});
