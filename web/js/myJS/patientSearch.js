/**
 * Created by NOS on 4/27/2017.
 */
$(document).ready(function () {

    var datos = false;
    var meses = false;
    var dias = false;
    var diasF = false;
    var validM = false;
    var validF = false;
    var validD = false;
    var existe_pac = false;


    //Validating the patitient's CI
    $('.paciente_ci').keyup(function () {

        var pacienteCI = $(this).val();

        if (pacienteCI !== '' && pacienteCI.length > 10) {
            var ci = $(this).val().toString();
            var mes = ci.charAt(2) + ci.charAt(3);
            var dia = ci.charAt(4) + ci.charAt(5);


            if ((mes > 12 || dia > 31) || (mes < 01 || dia < 01 )) {
                if ($('#month') && !meses) {
                    var ver = $('<div id="month" class="my-error">El número del mes tiene que estar entre 01 y 12, y el de los días entre 01 y 31. <br> Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    meses = true;
                }
            } else {
                $('#month').slideUp('slow', function () {
                    $('#month').remove();
                });
                meses = false;
                validM = true;

                console.log('estoy aqui');

            }

            if (mes == 02 && dia > 28) {
                if ($('#diasF') && !diasF) {
                    var ver = $('<div id="diasF" class="my-error">El número de CI insertado no es válido para el mes de Febrero. <br> Por favor rectifique los días.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    diasF = true;
                }
            } else {
                $('#diasF').slideUp('slow', function () {
                    $('#diasF').remove();
                });
                diasF = false;
                validF = true;

            }

            if ((mes == 04 || mes == 06 || mes == 09 || mes == 11) && dia > 30) {
                if ($('#dias') && !dias) {
                    var ver = $('<div id="dias" class="my-error">Los meses de Abril, Junio, Septiembre y Noviembre solo tienen 30 días.  <br> Por favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dias = true;
                }
            } else {
                $('#dias').slideUp('slow', function () {
                    $('#dias').remove();
                });
                dias = false;
                validD = true;

            }

            if (validM && validF && validD) {
                var pacienteCI = $(this).val();
                if (!datos) {
                    var data = {
                        ciP: pacienteCI
                    }
                    searchPatient(data);
                    datos = true;
                }
            }

            if ($('#module').val() == 'solictud') {


            }


        } else {
            if (pacienteCI == '') {
                $('#dias').slideUp('slow', function () {
                    $('#dias').remove();
                });
                dias = false;
                $('#diasF').slideUp('slow', function () {
                    $('#diasF').remove();
                });
                diasF = false;
                $('#month').slideUp('slow', function () {
                    $('#month').remove();
                });
                meses = false;
            }

            $('#datos_paciente').empty();
            $('#block-patient').addClass('hidden');
            datos = false;
            validD = false;
            validF = false;
            validM = false;
        }


    });

   if ($('#module').val()=='pac_search'){
    $('.paciente_ci').val('');
   }

    //Showing patient's data according to the CI
    function searchPatient(data) {
        $.ajax({
            type: 'get',
            url: "{{path('show_patient')}}",
            data: data,
            success: function (data) {
                if (data.hasOwnProperty("response") && data.response === "success") {
                    if (data.hasOwnProperty("patient")) {
                        var patient = JSON.parse(data.patient);

                        $('#datos_paciente').append('<div><h3 class="my-h4">Datos del paciente.</h3></div>');

                        $('#datos_paciente').append('<input id="idPaciente"  type="hidden" value="' + patient.id + '">');

                        $('#datos_paciente').append('<div>CI: ' + patient.ciPaciente + '</div>');
                        $('#datos_paciente').append('<div>Nombre: ' + patient.nombre + '</div>');
                        $('#datos_paciente').append('<div>Apellidos: ' + patient.apellidos + '</div>');
                        $('#datos_paciente').append('<div>Edad: ' + patient.edad + '</div>');
                        $('#datos_paciente').append('<div>Sexo: ' + patient.sexo + '</div>');
                        $('#datos_paciente').append('<div>No. HC: ' + patient.idHc + '</div>');
                        $('#datos_paciente').append('<div>Grupo Sanguíneo: ' + patient.tipoSangre + '</div>');
                        $('#datos_paciente').append('<div>Factor Rh: ' + patient.rh + '</div>');
                        if (patient.lactante == 'SI') {
                            $('#datos_paciente').append('<div>Es lactante: ' + patient.lactante + '</div>');
                        } else {
                            $('#datos_paciente').append('<div>Embarazos previos: ' + patient.embarazos + '</div>');
                            $('#datos_paciente').append('<div>Abortos Previos: ' + patient.abortos + '</div>');
                        }
                        $('#datos_paciente').append('<a id="idPaciente" class="btn btn-primary" href="solicitud/' + patient.id + '" value="' + patient.id + '">Agregar solicitud al paciente</a>');
                        $('#block-patient').removeClass('hidden');
                    }
                } else {
                    $('#datos_paciente').append('<div><h3 class="my-h3">El paciente no se encuentra en el sistema.</h3></div>');
                    $('#datos_paciente').append('<a id="idPaciente" class="btn btn-primary" href="solicitud/">Agregar paciente y solicitud</a>');
                    $('#block-patient').removeClass('hidden');

                }
            }
        });
    }

    //Validating the patient HC

    $('.num_hc').keyup(function () {
        var hc_number = $(this).val();

        if (hc_number != '' && hc_number.length > 2) {
            var data = {
                hc: hc_number
            }
            searchHC(data);
        } else {
            $('#id_hc').slideUp('slow', function () {
                $('#id_hc').remove();
            });
            existe_pac =false;
        }

    });

    function searchHC(data) {
        $.ajax({
            type: 'get',
            url: "{{path ('paciente_hc')}}/",
            data: data,
            success: function (data) {
                if (data.existe == 'true') {
                    if ($('#id_hc') && !existe_pac) {
                        var ver = $('<div id="id_hc" class="my-error">Ya existe un paciente con ese número de Historia Clínica.  <br> Por favor rectifique.</div>').insertAfter($('.num_hc').labels()).hide().slideDown('slow');
                        existe_pac = true
                    }

                }
            }
        })


    }


})


