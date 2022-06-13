function mensaje(indi, msg, panel) {

    var result = "";


    //$("#" + panel).hide('0');
    if (parseInt(indi) == 0) {

        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += ' <h5>ERROR!</h5>';
        result += '<p>' + msg + '</p>';
        result += '</div>';
        document.getElementById(panel).innerHTML = result;
        $("#" + panel).show('100');

    }
    if (parseInt(indi) == 1) {

        result = '<div class="alert alert-dismissible alert-warning">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += ' <h5>ALERTA!</h5>';
        result += '<p>' + msg + '</p>';
        result += '</div>';
        document.getElementById(panel).innerHTML = result;
        $("#" + panel).show('100');
    }

    if (parseInt(indi) == 2) {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<p>' + msg + '</p>';
        result += '</div>';
        document.getElementById(panel).innerHTML = result;
        $("#" + panel).show('100');

    }

    if (parseInt(indi) == 3) {
        result = '<div class="alert alert-dismissible alert-success">';
        result += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result += '<p>' + msg + '</p>';
        result += '</div>';
        document.getElementById(panel).innerHTML = '';

    }
    if (parseInt(indi) == 4) {
        result = '<div class="alert alert-dismissible alert-info">';
        result += '<button type="button" class="close" data-dismiss="alert"></button>';
        result += '<p>' + msg + '</p>';
        result += '</div>';
        document.getElementById(panel).innerHTML = result;
        $("#" + panel).show('100');

    }

    $("#" + panel).focus();
}



function dialogo(indi, msg) {
    if (parseInt(indi) == 0) {
        $.dialog({
            title: 'Error!',
            type: 'red',
            typeAnimated: true,
            content: msg,
        });
    }
    if (parseInt(indi) == 1) {
        $.dialog({
            title: 'Alerta!',
            type: 'orange',
            typeAnimated: true,
            content: msg,
        });
    }
    if (parseInt(indi) == 2) {
        $.dialog({
            title: 'Exito!',
            type: 'Green',
            typeAnimated: true,
            content: msg,
        });
    }

    if (parseInt(indi) == 5) {
        $.dialog({
            title: 'Procesando!',
            type: 'blue',
            typeAnimated: true,
            content: msg,
        });
    }

    if (parseInt(indi) == 3) {
        toastr["success"](msg);
    }
    if (parseInt(indi) == 4) {
        toastr["info"](msg);
    }
    if (parseInt(indi) == 6) {
        toastr["warning"](msg);
    }
    if (parseInt(indi) == 7) {
        toastr["error"](msg);
    }




}