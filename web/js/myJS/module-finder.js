/**
 * Created by NOS on 8/2/2017.
 */
$(document).ready(function () {
    var mod = $('#module').val();
    if (mod == 'solicitud_pac' || mod =='solicitud' || mod =='edit_solicitud' || mod =='pac_search'){
        mod='solicitudes';
    }
    console.log(mod);
    $('#' + mod + '').addClass('my-active');
    $('.solicitud').addClass('my-active');
    if ($('#module').val() == 'home') {
        $('#home-nav').addClass('my-active');
    }
})