/**
 * Created by NOS on 4/27/2017.
 */
$(document).ready(function () {

    var datos = false;
    var datos1 = false;
    var meses = false;
    var dias = false;
    var diasF = false;
    var validM = false;
    var validF = false;
    var validD = false;
    var existe_ci = false;
    var existe_hc = false;


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
                    // disableSumbit();
                }
            } else {
                $('#month').slideUp('slow', function () {
                    $('#month').remove();
                    // enableSubmit();
                });
                meses = false;
                validM = true;

            }

            if (mes == 02 && dia > 28) {
                if ($('#diasF') && !diasF) {
                    var ver = $('<div id="diasF" class="my-error">El número de CI insertado no es válido para el mes de Febrero. <br> Por favor rectifique los días.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    diasF = true;
                    // disableSumbit();
                }
            } else {
                $('#diasF').slideUp('slow', function () {
                    $('#diasF').remove();
                    // enableSubmit();
                });
                diasF = false;
                validF = true;

            }

            if ((mes == 04 || mes == 06 || mes == 09 || mes == 11) && dia > 30) {
                if ($('#dias') && !dias) {
                    var ver = $('<div id="dias" class="my-error">Los meses de Abril, Junio, Septiembre y Noviembre solo tienen 30 días.  <br> Por favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dias = true;
                    // disableSumbit();
                }
            } else {
                $('#dias').slideUp('slow', function () {
                    $('#dias').remove();
                    // enableSubmit();
                });
                dias = false;
                validD = true;

            }

            if (validM && validF && validD) {
                if ($('#module').val() == 'solicitud' && !datos1) {
                    if ($(this).val().length > 10) {

                        var pacienteCI = $(this).val();
                        console.log(pacienteCI + 123)


                        if (!datos1) {
                            var data = {
                                searchNum: pacienteCI,
                                field: 'ci'
                            };
                            search(data);
                            datos1 = true;
                        }
                    }
                } else {
                    var pacienteCI = $(this).val();
                    if (!datos) {
                        var data = {
                            ciP: pacienteCI
                        };
                        searchPatient(data);
                        datos = true;
                    }
                }

            }

        } else {
            if (pacienteCI == '') {
                $('#dias').slideUp('slow', function () {
                    $('#dias').remove();
                    // enableSubmit();
                });
                dias = false;
                $('#diasF').slideUp('slow', function () {
                    $('#diasF').remove();
                    // enableSubmit();
                });
                diasF = false;
                $('#month').slideUp('slow', function () {
                    $('#month').remove();
                    // enableSubmit();
                });
                meses = false;
            }

            $('#datos_paciente').empty();
            $('#block-patient').addClass('hidden');
            datos = false;
            validD = false;
            validF = false;
            validM = false;

            $('#id_pac').slideUp('slow', function () {
                $('#id_pac').remove();
                // enableSubmit()
            });
            existe_ci = false;
            datos1 = false;
        }


    });

    if ($('#module').val() == 'pac_search') {
        $('.paciente_ci').val('');
    }

    //Showing patient's data according to the CI
    function searchPatient(data) {

        if ($('#module').val() == 'paciente') {
            var direccion = "search/{{path('show_patient')}}";
        } else {
            var direccion = "{{path('show_patient')}}";
        }
        $.ajax({
            type: 'get',
            url: direccion,
            data: data,
            success: function (data) {
                if (data.hasOwnProperty("response") && data.response === "success") {
                    if (data.hasOwnProperty("patient")) {
                        if ($('#module').val() != 'paciente') {
                            var patient = JSON.parse(data.patient);

                            $('#datos_paciente').append('<div><h3 class="h3 form-title">Datos del paciente.</h3></div>');
                            $('#datos_paciente').append('<input id="idPaciente"  type="hidden" value="' + patient.id + '">');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">CI: ' + patient.ciPaciente + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">No. HC: ' + patient.idHc + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Nombre: ' + patient.nombre + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Apellidos: ' + patient.apellidos + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Edad: ' + patient.edad + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Sexo: ' + patient.sexo + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Grupo Sanguíneo: ' + patient.tipoSangre + '</div>');
                            $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Factor Rh: ' + patient.rh + '</div>');
                            if (patient.lactante == 'SI') {
                                $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Es lactante: ' + patient.lactante + '</div>');
                            } else {
                                $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Embarazos previos: ' + patient.embarazos + '</div>');
                                $('#datos_paciente').append('<div class="col-md-5 col-sm-6 col-xs-6 col-lg-6 top-separator">Abortos Previos: ' + patient.abortos + '</div>');
                            }
                            $('#datos_paciente').append('<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 form-group top-separator"><a id="idPaciente" class="btn btn-lg btn-primary" href="solicitud/' + patient.id + '" value="' + patient.id + '"><span class="glyphicon glyphicon-plus-sign"></span> Agregar solicitud al paciente</a></div>');
                        $('#block-patient').removeClass('hidden');
                        } else {
                            var ver_error = $('<div id="id_pac" class="my-error">Ya existe un paciente con ese número de identidad.  <br> Por favor rectifique.</div>').insertAfter($('#paciente_ciPaciente').labels()).hide().slideDown('slow');
                        }
                    }
                } else {
                    if ($('#module').val() != 'paciente') {
                        $('#datos_paciente').append('<div><h3 class="my-h3">El paciente no se encuentra en el sistema.</h3></div>');
                        $('#datos_paciente').append('<a id="idPaciente" class="btn btn-primary btn-lg" href="solicitud/"><span class="glyphicon glyphicon-plus-sign"></span> Agregar paciente y solicitud</a>');
                        $('#block-patient').removeClass('hidden');
                    }
                }
            }
        });
    }

    //Validating the patient HC
    $('.num_hc').keyup(function () {
        var hc_number = $(this).val();
        if (hc_number != '' && hc_number.length > 2) {
            var data = {
                searchNum: hc_number,
                field: 'hc'
            }
            search(data);
        } else {
            $('#id_hc').slideUp('slow', function () {
                $('#id_hc').remove();
                // enableSubmit();
            });
            existe_hc = false;
        }
    });

    function search(data) {
        $.ajax({
            type: 'get',
            url: "{{path ('paciente_search')}}/",
            data: data,
            success: function (data) {
                if (data.existe == 'true') {
                    if (data.field == 'hc') {
                        if ($('#id_hc') && !existe_hc) {

                            var ver = $('<div id="id_hc" class="my-error">Ya existe un paciente con ese número de Historia Clínica.  <br> Por favor rectifique.</div>').insertAfter($('.num_hc').labels()).hide().slideDown('slow');

                            existe_hc = true;
                            // disableSumbit()
                        }
                    } else {
                        console.log('cojone');
                        if ($('#id_pac') && !existe_ci) {
                            var ver = $('<div id="id_pac" class="my-error">Ya existe un paciente con ese número de identidad.  <br> Por favor rectifique.</div>').insertAfter($('.paciente_ci').labels()).hide().slideDown('slow');
                            existe_ci = true;
                            // disableSumbit();
                        }

                    }
                }
            }
        });
    }

    function disableSumbit() {
        // $('#submit_form').addClass('hidden');
    }

    function enableSubmit() {
        // $('#submit_form').removeClass('hidden');

    }


});


