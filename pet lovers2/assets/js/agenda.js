$(document).ready(inicializarEventos);

function inicializarEventos() {
  $("#b1").click(agendarcita);
}

function agendarcita(){
    alert("Su cita ha sido agendada con exito.");
}
