document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        //Traduzindo o fullcalendar
        locale: 'pt-br',

        plugins: ['interaction', 'dayGrid'],
        //defaultDate: '2019-04-12',

        // Definindo se editavel
        editable: true,

        eventLimit: true, // allow "more" link when too many events

        // Pegando eventos
        events: './list_eventos.php',

        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },

        //Pegando o evento
        eventClick: function (info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate
            
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar').modal('show');
        },

        //Posibilitando a escolha de uma data
        selectable: true,

        //Pegando dados da data selecionada
        select: function (info) {
            // alert('Inicio do evento ' + info.start.toLocaleString());
            $('#cadastrar_pedido #dth').val(info.start.toLocaleString())
            $('#cadastrar_pedido').modal('show')
        }

    });


    calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
};

//Sempre que carregar a pagina
$(document).ready(function () {
    $("#add_event").on("submit", function (event) {
        //Evitando fechar modal
        event.preventDefault();
        //Retornando quando checkbox foram checkados

        $.ajax({
            type: "POST",
            url: "cad_evento.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (retorna) {
                //Cadastrou com sucesso
                if (retorna['sit']) {
                    //Gerando um html de retorno
                    // $('#msg').html(retorna['msg']);
                    location.reload();
                }
                //Senão cadastrou com sucesso
                else {
                    $('#msg').html(retorna['msg']);
                }
            }
        });
    });
});


