document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        select: function (info) {
            console.log('Selected date: ' + info.startStr);
            // Here you can store the selected date in a hidden input field or send it to the server
        }
    });

    calendar.render();
});
