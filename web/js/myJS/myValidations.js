/**
 * Created by NOS on 4/20/2017.
 */
$(document).ready(function () {


    //Declaring variables
    var $motivo_selector = $('.krytek_databundle_motivo');
    var $diagnostico_selector = $('.krytek_databundle_diagnosticos');
    var meses = false;
    var dias = false;
    var diasF = false;
    var dm = false;
    var dd = false;
    var form_name;
    var mensaje;


    //Setting form name fot validations
    if ($('form').attr('id') === 'paciente') {
        form_name = $('form').attr('id');
    }
    else {
        if ($('form').attr('id') === 'bolsa') {
            form_name = $('form').attr('id');
            mensaje = ['produccion', 'vencimiento'];
        } else {
            form_name = 'solicitud_pcnt';
            mensaje = ['solicitud', 'realizar'];
        }
    }


    //Hidding components
    $motivo_selector.hide();
    $diagnostico_selector.hide();
    $('.embarazos').hide();
    $('.abortos').hide();
    $('.incompatible').hide();


    if ($('#embarazos').val()=='SI'){
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
    })

    $('input#' + form_name + '_lactante_1').change(function () {
        $('.embarazos').fadeIn(500);
    })

    $('input#' + form_name + '_embarazos_0').change(function () {
        $('.abortos').fadeIn(500);
        $('.incompatible').fadeIn(500);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);
    })

    $('input#' + form_name + '_embarazos_1').change(function () {
        $('.abortos').fadeOut(500);
        $('#' + form_name + '_abortos_1').attr('checked', false);
        $('#' + form_name + '_abortos_0').attr('checked', false);
        $('.incompatible').fadeOut(500);
        $('#solicitud_incompatibilidadMF_0').attr('checked', false);
        $('#solicitud_incompatibilidadMF_1').attr('checked', false);

    })


    //Managing motivos according to the components
    $('.krytek_databundle_componente').change(function () {
        if ($(this).val() !== '') {
            if ($(this).val() === 'Concentrado de eritrocitos') {
                if ($diagnostico_selector.val() === '') {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                } else {
                    $motivo_selector.empty();
                    $diagnostico_selector.show();
                    var data = {
                        comp: $diagnostico_selector.val(),
                        diag: 'diag'
                    };

                    fillSelect(data);
                    $motivo_selector.show();
                    $motivo_selector.attr('required', 'required');
                }


            }
            else {
                $motivo_selector.empty();
                $diagnostico_selector.hide();
                var data = {
                    comp: $(this).val()
                };
                fillSelect(data);

            }
            $motivo_selector.show();
            $motivo_selector.attr('required', 'required');
        }
        else {
            $motivo_selector.hide();
            $diagnostico_selector.hide();
        }
    });

    $('.krytek_databundle_diagnosticos').change(function () {
        if ($(this).val() !== '') {
            $motivo_selector.empty();

            var data = {
                comp: $(this).val(),
                diag: 'diag'
            };

            fillSelect(data);

            $motivo_selector.show();

        } else {
            $motivo_selector.empty();
        }

    })

    function fillSelect(data) {

        $.ajax({
            type: 'get',
            url: "{{path('select_motivos')}}",
            data: data,
            success: function (data) {
                var motivos = data.motivo;
                var idmotivos = data.idmotivo;

                for (i in motivos) {
                    $motivo_selector.append('<div class="radio"><input type="radio" name="motivotransfusion[Motivo]" value="' + idmotivos[i] + '">' + motivos[i] + '</input></div>');
                }
            }

        });
    }


    //Validation block for the forms
    $('form').validate({
        rules: {


            'paciente[peso]': {
                range: [1.00, 400],

            },

            'paciente[edad]': {
                range: [1, 150],
            }
        },
        messages: {
            peso: {
                range: "Solo se admiten números decimales entre 1 y 400."
            },
            edad: {
                range: "Solo se admiten números enteros entre 1 y 150."
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


    //Validation of the patitient's CI



    //Validating dates
    $('.date_sec').change(function () {

        var primd = $('.date_prim').val().toString();

        if (primd != '') {
            var month = primd.charAt(0) + primd.charAt(1);
            var day = primd.charAt(3) + primd.charAt(4);
            var month1 = this.value.toString().charAt(0) + this.value.toString().charAt(1);
            var day1 = this.value.toString().charAt(3) + this.value.toString().charAt(4);

            if (month > month1) {
                if ($('#dmonth') && !dm) {
                    var ver = $('<div id="dmonth" class="my-error">El mes a ' + mensaje[1] + ' la transfusión no puede ser anterior al de la ' + mensaje[0] + '. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dm = true;
                }
            } else {
                $('#dmonth').slideUp('slow', function () {
                    $('#dmonth').remove();
                });
                dm = false;
            }

            if (month == month1 && day > day1) {
                if ($('#dday') && !dd) {
                    var ver = $('<div id="dday" class="my-error">El día a ' + mensaje[1] + ' la transfusión no puede ser anterior al que se realiza la ' + mensaje[0] + '. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dd = true;
                }

            } else {
                $('#dday').slideUp('slow', function () {
                    $('#dday').remove();
                });
                dd = false;
            }
        }
    })

    $('.date_prim').change(function () {

        var primd = $('.date_sec').val().toString();

        if (primd != '') {
            var month = primd.charAt(0) + primd.charAt(1);
            var day = primd.charAt(3) + primd.charAt(4);
            var month1 = this.value.toString().charAt(0) + this.value.toString().charAt(1);
            var day1 = this.value.toString().charAt(3) + this.value.toString().charAt(4);

            if (month < month1) {
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
                    var ver = $('<div id="dday" class="my-error">El día de la ' + mensaje[0] + ' no puede ser posterior al día a ' + mensaje[1] + ' la transfusión. Por Favor rectifique.</div>').insertAfter($(this).labels()).hide().slideDown('slow');
                    dd = true;
                }

            } else {
                $('#dday').slideUp('slow', function () {
                    $('#dday').remove();
                });
                dd = false;
            }
        }
    })


})