/**
 * Created by NOS on 4/20/2017.
 */
$(document).ready(function () {


    //Declaring variables
    var $motivo_selector = $('.krytek_databundle_motivo');
    var $diagnostico_selector = $('.krytek_databundle_diagnosticos');
    var $pruebas_selector = $('.pruebas_lab');
    var meses = false;
    var dias = false;
    var diasF = false;
    var dm = false;
    var dd = false;
    var edit_motiv = false;
    var form_name;
    var mensaje;
    var sexo = 'M';
    var lactante = 'N/A';


    //Setting form name for validations
    if ($('form').attr('id') === 'paciente') {
        form_name = $('form').attr('id');
    }
    else {
        if ($('form').attr('id') === 'bolsa') {
            form_name = $('form').attr('id');
            mensaje = ['produccion', 'de vencimiento'];
        } else {
            if ($('form').attr('id') === 'recepcion') {
                form_name = $('form').attr('id');
                mensaje = ['recepción', 'de la transfusión'];
            } else {
                form_name = 'solicitud_pcnt';
                mensaje = ['solicitud de la transfusión', 'a realizar la transfusión'];
            }
        }
    }


    //Hidding components
    $motivo_selector.hide();
    $diagnostico_selector.hide();
    $('.embarazos').hide();
    $('.abortos').hide();
    $('.incompatible').hide();


    if ($('#embarazos').val() == 'NO' || sexo == 'M') {
        $('.incompatiblepac').hide();
        console.log($('#embarazos').val());
    }


    //Setting attributes for some of the form items
    $('.date').datepicker({
        dateFormat: 'mm/dd/yy',
    });
    $('.lactante').attr('id', 'lactante');
    /*$('.weight').attr('name', 'peso');
    $('.edad').attr('name', 'edad');*/


    //Restriction functions for the inputs
    $('.only_number').bind('keydown', function (event) {
        // the keycode for the key pressed
        var keyCode = event.which;
        // 48-57 Standard Keyboard Numbers
        var isStandard = (keyCode > 47 && keyCode < 58);
        // 96-105 Extended Keyboard Numbers (aka Keypad)
        var isExtended = (keyCode > 95 && keyCode < 106);
        // 8 Backspace, 46 Forward Delete
        // 37 Left Arrow, 38 Up Arrow, 39 Right Arrow, 40 Down Arrow
        var validKeyCodes = ',8,37,38,39,40,46,';
        var isOther = ( validKeyCodes.indexOf(',' + keyCode + ',') > -1);
        if (isStandard || isExtended || isOther) {
            return true;
        } else {
            return false;
        }
    }).bind('blur', function () {
        // regular expression that matches everything that is not a number
        var pattern = new RegExp('[^0-9]+', 'g');
        var $input = $(this);
        var value = $input.val();
        // clean the value using the regular expression
        value = value.replace(pattern, '');
        $input.val(value)
    });

    $('.weight').keyup(function () {
        this.value = (this.value + '').replace(/[^0-9.]/g, '');
    });

    $('.only_letter').keyup(function () {
        this.value = (this.value + '').replace(/[^a-zA-Z ñÑ]/g, '');
    });


    //Managing patient's pregnancy states
    $('input#' + form_name + '_sexo_1').change(function () {
        sexo = 'F';
        $('#pac_sexo').removeClass('hidden');
        if (lactante == 'N') {
            $('.embarazos').fadeIn(500);
        }
    });

    $('input#' + form_name + '_sexo_0').change(function () {
        sexo = 'M';
        hideBySex();
    });

    $('input#' + form_name + '_lactante_0').change(function () {
        $('.embarazos').fadeOut(500);
        $('.abortos').fadeOut(500);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('#' + form_name + '_embarazos_1').attr('checked', false);
        $('#' + form_name + '_embarazos_0').attr('checked', false);
        $('.incompatible').fadeOut(500);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);
        lactante = 'S';
    });

    $('input#' + form_name + '_lactante_1').change(function () {
        if (sexo == 'F') {
            $('.embarazos').fadeIn(500);
        }
        lactante = 'N';

    });

    $('input#' + form_name + '_embarazos_0').change(function () {
        $('.abortos').fadeIn(500);
        $('.incompatible').fadeIn(500);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);
    });

    $('input#' + form_name + '_embarazos_1').change(function () {
        $('.abortos').fadeOut(500);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('.incompatible').fadeOut(500);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);

    });

    function hideBySex() {
        $('#pac_sexo').removeClass('hidden');
        $('.embarazos').fadeOut(500);
        $('.abortos').fadeOut(500);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('#' + form_name + '_embarazos_1').attr('checked', false);
        $('#' + form_name + '_embarazos_0').attr('checked', false);
        $('.incompatible').fadeOut(500);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);
    }
    
    
    
    
    
    //Managing motivos according to the components

    if ($('#componente').val() != '' && $('#module').val() == 'edit_solicitud') {
        var sol_comp = $('#componente').val();
        // $('#componenete_solicitud select').val($('#componente').val());
        $('#solicitud_ComponenteATransfundir').val(sol_comp).change(finderEditSol(sol_comp));


    }
    function finderEditSol(sol_comp) {
        console.log('pinga de');
        if (sol_comp !== '') {
            if (sol_comp === 'Concentrado de eritrocitos') {
                $diagnostico_selector.val($('#diag_solicitud').val());
                console.log($('#diag_solicitud').val());
                if ($diagnostico_selector.val() === '') {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                    $diagnostico_selector.attr('aria-required', 'true');
                    $diagnostico_selector.attr('required', 'required');
                    $('#diag_selector').removeClass('hidden')
                } else {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                    var data = {
                        comp: $diagnostico_selector.val(),
                        diag: 'diag'
                    };

                    fillSelect(data);
                    $diagnostico_selector.attr('aria-required', 'true');
                    $diagnostico_selector.attr('required', 'required');
                    $motivo_selector.show();
                    $motivo_selector.attr('required', 'required');
                    console.log('mierda');
                }
            }
            else {
                $motivo_selector.empty();
                $diagnostico_selector.hide();
                $diagnostico_selector.val('');
                $diagnostico_selector.removeAttr('required', 'required');
                $('#solicitud_Diagnosticos-error').remove();


                var data = {
                    comp: sol_comp
                };
                fillSelect(data);
                console.log('mierda1');
                edit_motiv = false;
                $('#diag_selector').addClass('hidden');

            }
            $motivo_selector.show();
            $motivo_selector.attr('required', 'required');
        }
        else {
            $motivo_selector.hide();
            $diagnostico_selector.hide();
            $('#diag_selector').addClass('hidden');
            console.log('mierda2');
        }
    }

    $('.krytek_databundle_componente').change(function () {
        console.log('pinga de triya');
        if ($(this).val() !== '') {
            if ($(this).val() === 'Concentrado de eritrocitos') {
                if ($diagnostico_selector.val() === '') {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                    $diagnostico_selector.attr('aria-required','true');
                    $diagnostico_selector.attr('required', 'required');
                    $('#diag_selector').removeClass('hidden')
                } else {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                    var data = {
                        comp: $diagnostico_selector.val(),
                        diag: 'diag'
                    };

                    fillSelect(data);
                    $diagnostico_selector.attr('aria-required','true');
                    $diagnostico_selector.attr('required', 'required');
                    $motivo_selector.show();
                    $motivo_selector.attr('required', 'required');
                    console.log('mierda');
                }
            }
            else {
                $motivo_selector.empty();
                $diagnostico_selector.hide();
                $diagnostico_selector.val('');
                $diagnostico_selector.removeAttr('required', 'required');
                $('#solicitud_Diagnosticos-error').remove();


                var data = {
                    comp: $(this).val()
                };
                fillSelect(data);
                console.log('mierda1');
                edit_motiv = false;
                $('#diag_selector').addClass('hidden');

            }
            $motivo_selector.show();
            $motivo_selector.attr('required', 'required');
        }
        else {
            $motivo_selector.hide();
            $diagnostico_selector.hide();
            $('#diag_selector').addClass('hidden');
            console.log('mierda2');
        }
    });

    $('.krytek_databundle_diagnosticos').change(function () {
        if ($(this).val() !== '') {
            $motivo_selector.empty();
            edit_motiv = false;



            var data = {
                comp: $(this).val(),
                diag: 'diag'
            };

            fillSelect(data);

            $motivo_selector.show();

        } else {
            $motivo_selector.empty();
        }


    });

    function fillSelect(data) {

        $.ajax({
            type: 'get',
            url: "{{path('select_motivos')}}",
            data: data,
            success: function (data) {
                var motivos = data.motivo;
                var idmotivos = data.idmotivo;

                for (i in motivos) {
                    $motivo_selector.append('<div><input id="radio_' + idmotivos[i] + '" type="radio" name="motivotransfusion[Motivo]" value="' + idmotivos[i] + '" required="required" aria-required="true" class="radio-inline">' + motivos[i] + '</input></div>');
                    if ($('#module').val() == 'edit_solicitud' && $('#motivo').val() == idmotivos[i] && $('#diag_solicitud').val() == $('#solicitud_Diagnosticos').val()) {
                        console.log('me cago en mi');
                        if (!edit_motiv) {
                            $('#radio_' + idmotivos[i] + '').attr('checked', true);
                            edit_motiv = true;
                        }
                    } else {
                        if ($('#module').val() == 'edit_solicitud' && $('#motivo').val() == idmotivos[i] && $('#diag_solicitud').val() == null) {
                            console.log($('#diag_solicitud').val() + 12);
                            if (!edit_motiv) {
                                $('#radio_' + idmotivos[i] + '').attr('checked', true);
                                edit_motiv = true;
                            }
                        }
                    }
                }
            }

        });
    }


    //Validation block for the forms
    $('form').validate({
        rules: {

            'paciente[peso]': {
                range: [1.00, 400]
            },

            'paciente[edad]': {
                range: [1, 150]
            },

            'solicitud[hb]': {
                range: [1.00, 20]
            },
            'solicitud[tp]': {
                range: [1.00, 60]
            },
            'solicitud[tptk]': {
                range: [1.00, 60]
            },
            'solicitud[plaquetas]': {
                range: [1.00, 400]
            },
            // 'solicitud[registro_profesional]': {
            //     range: [1.00, 400]
            // }
        },
        messages: {
            'paciente[peso]': {
                range: "Solo se admiten números decimales entre 1 y 400."
            },
            'paciente[edad]': {
                range: "Solo se admiten números enteros entre 1 y 150."
            },
            'solicitud[hb]': {
                range: "Solo se admiten números decimales entre 1 y 20."
            },
            'solicitud[tp]': {
                range: "Solo se admiten números decimales entre 1 y 60."
            },
            'solicitud[tptk]': {
                range: "Solo se admiten números decimales entre 1 y 60."
            },
            'solicitd[plaquetas]': {
                range: "Solo se admiten números decimales entre 1 y 400."
            }

        },

        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertBefore(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
        }
    });


    //Validating dates
    $('.date_sec').change(function () {
        console.log('esta aqui');

        var primd = $('.date_prim').val().toString();

        if (primd != '') {
            var month = primd.charAt(0) + primd.charAt(1);
            var day = primd.charAt(3) + primd.charAt(4);
            var month1 = this.value.toString().charAt(0) + this.value.toString().charAt(1);
            var day1 = this.value.toString().charAt(3) + this.value.toString().charAt(4);

            var year = primd.charAt(6) + primd.charAt(7) + primd.charAt(8) + primd.charAt(9);
            var year1 = this.value.toString().charAt(6) + this.value.toString().charAt(7) + this.value.toString().charAt(8) + this.value.toString().charAt(9);
            console.log('esta aqui 1');
            if (month > month1 || year > year1) {
                if ($('#dmonth') && !dm) {
                    console.log('esta aqui 2');
                    var ver = $('<div id="dmonth" class="my-error">El mes a ' + mensaje[1] + ' no puede ser anterior al de la ' + mensaje[0] + '. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dm = true;
                }
            } else {
                $('#dmonth').slideUp('slow', function () {
                    $('#dmonth').remove();
                });
                dm = false;
            }

            if (month == month1 && day > day1) {
                console.log('esta aqui 3');
                if ($('#dday') && !dd) {
                    var ver = $('<div id="dday" class="my-error">El día ' + mensaje[1] + ' no puede ser anterior al que se realiza la ' + mensaje[0] + '. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dd = true;
                }

            } else {
                console.log('esta aqui 4');
                $('#dday').slideUp('slow', function () {
                    $('#dday').remove();
                });
                dd = false;
            }
        }
    })

    $('.date_prim').change(function () {

        var primd = $('.date_sec').val().toString();
        console.log('no esta aqui');
        if (primd != '') {
            var month = primd.charAt(0) + primd.charAt(1);
            var day = primd.charAt(3) + primd.charAt(4);
            var month1 = this.value.toString().charAt(0) + this.value.toString().charAt(1);
            var day1 = this.value.toString().charAt(3) + this.value.toString().charAt(4);

            var year = primd.charAt(6) + primd.charAt(7) + primd.charAt(8) + primd.charAt(9);
            var year1 = this.value.toString().charAt(6) + this.value.toString().charAt(7) + this.value.toString().charAt(8) + this.value.toString().charAt(9);
            console.log('no esta aqui1');

            if (month < month1 || year < year1) {
                console.log('no esta aqui2');
                if ($('#dmonth') && !dm) {
                    var ver = $('<div id="dmonth" class="my-error">El mes en la fecha de ' + mensaje[0] + ' no puede ser posterior al de la fecha ' + mensaje[1] + '. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dm = true;
                }
            } else {
                $('#dmonth').slideUp('slow', function () {
                    $('#dmonth').remove();
                });
                dm = false;
            }

            if (month == month1 && day < day1) {

                if ($('#dday') && !dd) {
                    console.log('no esta aqui3');
                    var ver = $('<div id="dday" class="my-error">El día de la ' + mensaje[0] + ' no puede ser posterior al día ' + mensaje[1] + ' . Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dd = true;
                }

            } else {
                console.log('no esta aqui4');
                $('#dday').slideUp('slow', function () {
                    $('#dday').remove();
                });
                dd = false;
            }
        }
    })


    //Managing pruebas acorde al componente a transfundir

    if ($('#recepcion_module')){
        findPruebaLab();
    }

    function findPruebaLab() {

        var data = {
            comp:  $('#prueba_selector').val()
        };

        console.log(data.comp);
        $.ajax({
            type: 'get',
            url:"{{ path('select_prueba')}}",
            data: data,
            success: function (data) {
                var pruebas = data.pruebas;
                var idpruebas = data.idpruebas;

                for (i in pruebas){
                    $pruebas_selector.append('<div><input id="checkbox_' + idpruebas[i] + '" value="' + idpruebas[i] + '" type="checkbox" name="pruebas" class="checkbox-inline" aria-required="true" required="required">' + pruebas[i] + '</input></div>');
                }
            }
        });


        $pruebas_selector.attr('required', 'required');


    }



})