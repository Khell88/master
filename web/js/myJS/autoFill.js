/**
 * Created by NOS on 5/31/2017.
 */
$(document).ready(function () {

    var load_diag = false;
    var component = $('#solicitud_ComponenteATransfundir');
    component.val($('#componente').val());
    component.change();

    if ($('#diag').val() != '' && !load_diag) {
        var diag = $('#solicitud_Diagnosticos');
        diag.val($('#diag').val());
        diag.change();
        load_diag = true;
        console.log('1.2.3');

    }

});