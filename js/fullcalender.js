document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: '2020-09-07',
    headerToolbar: {
      left: 'prev,next today, addRoom, addReservation',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    }
  });

  calendar.render();
});