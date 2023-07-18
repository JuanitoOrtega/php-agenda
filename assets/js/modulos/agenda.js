const fechaModal = new bootstrap.Modal(document.getElementById('fechaModal'));
const formEvento = document.querySelector('#formEvento');
const nombre = document.querySelector('#nombre');
const fecha_inicio = document.querySelector('#fecha_inicio');
const fecha_fin = document.querySelector('#fecha_fin');
const color = document.querySelector('#color');
const eventoId = document.querySelector('#id');
const btnEliminar = document.querySelector('#btnEliminar');
const btnAccion = document.querySelector('#btnAccion');
const fechaModalLabel = document.querySelector('#fechaModalLabel');

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        events: base_url + 'principal/listar',
        editable: true,
        // Para registrar un nuevo evento
        dateClick: function (info) {
            // console.log(info);
            formEvento.reset();
            eventoId.value = '';
            btnEliminar.classList.add('d-none');
            fechaModalLabel.textContent = 'Registrar evento';
            btnAccion.textContent = 'Registrar evento';
            
            // Establecer fecha y hora de inicio
            let fechaInicio = moment(info.dateStr);
            fecha_inicio.value = fechaInicio.format('YYYY-MM-DDTHH:mm');
            
            // Establecer fecha y hora de finalización (agregando 1 hora a la fecha de inicio)
            let fechaFin = moment(info.dateStr);
            fecha_fin.value = fechaFin.format('YYYY-MM-DDTHH:mm');
            
            fechaModal.show();
        },
        // Para actualizar un evento
        eventClick: function (info) {
            // console.log(info);
            btnEliminar.classList.remove('d-none');
            fechaModalLabel.textContent = 'Modificar evento';
            btnAccion.textContent = 'Modificar evento';
            eventoId.value = info.event.id;
            nombre.value = info.event.title;

            // Convertir las fechas a formato adecuado para los inputs
            let fechaInicio = moment(info.event.start);
            let fechaFin = moment(info.event.end);
            let fechaInicioFormateada = fechaInicio.format('YYYY-MM-DDTHH:mm');
            let fechaFinFormateada = fechaFin.format('YYYY-MM-DDTHH:mm');

            fecha_inicio.value = fechaInicioFormateada;
            fecha_fin.value = fechaFinFormateada;

            color.value = info.event.backgroundColor;
            fechaModal.show();
        },
        // Para arrastrar y mover un evento
        eventDrop: function (info) {
            // console.log(info);
            const idEvento = info.event.id;
            const fechaInicio = moment(info.event.start).format('YYYY-MM-DDTHH:mm');
            const fechaFin = moment(info.event.end).format('YYYY-MM-DDTHH:mm');
            const url = base_url + 'principal/drop';
            const data = new FormData();
            data.append('id', idEvento);
            data.append('fecha_inicio', fechaInicio);
            data.append('fecha_fin', fechaFin);
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                    const res = JSON.parse(this.responseText);
                    alertaPersonalizada(res.type, res.msg);
                    if (res.type == 'success') {
                        calendar.refetchEvents();
                    }
                }
            }
        }
    });
    calendar.render();
    formEvento.addEventListener('submit', function(e) {
        e.preventDefault();
        if (nombre.value == '') {
            alertaPersonalizada('warning', 'El nombre del evento es requerido');
        } else if (fecha_inicio.value == '') {
            alertaPersonalizada('warning', 'La fecha y hora de inicio es requerido');
        } else if (fecha_fin.value == '') {
            alertaPersonalizada('warning', 'La fecha y hora de finalización es requerido');
        } else {
            const url = base_url + 'principal/registrar';
            const data = new FormData(formEvento);
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(data);
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
    btnEliminar.addEventListener('click', function(){
        fechaModal.hide();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const url = base_url + 'principal/eliminar/' + eventoId.value;
                const http = new XMLHttpRequest();
                http.open('GET', url, true);
                http.send();
                http.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // console.log(this.responseText);
                        const res = JSON.parse(this.responseText);
                        alertaPersonalizada(res.type, res.msg);
                        if (res.type == 'success') {
                            calendar.refetchEvents();
                        }
                    }
                }
            }
        });
    });
});