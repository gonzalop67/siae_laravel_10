$(document).ready(function () {
    APP.validacionGeneral('form-general');
    $("#mnu_icono").on('change', function () {
        $('#mostrar-icono').removeClass().addClass($(this).val());
    });
});
