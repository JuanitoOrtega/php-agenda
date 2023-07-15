const fechaModal = new bootstrap.Modal(document.getElementById('fechaModal'));
const formEvento = document.querySelector('#formEvento');
const nombreEvento = document.querySelector('#nombreEvento');
const fechaEvento = document.querySelector('#fechaEvento');
const colorEvento = document.querySelector('#colorEvento');

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        locale: 'es',
        dateClick: function (info) {
            // console.log(info);
            fechaEvento.value = info.dateStr;
            fechaModal.show();
        }
    });
    calendar.render();
    formEvento.addEventListener('submit', function(e) {
        e.preventDefault();
        if (nombreEvento.value == '') {
            alertaPersonalizada('warning', 'El nombre del evento es requerido');
        } else if (fechaEvento.value == '') {
            alertaPersonalizada('warning', 'La fecha del evento es requeridos');
        } else {
            const url = base_url + 'home/registrar';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(new FormData(formEvento));
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPersonalizada(res.type, res.msg);
                    if (res.type == 'success') {
                        formEvento.reset();
                        fechaModal.hide();
                        calendar.refetchEvents();
                    }
                }
            }
        }
    });
});