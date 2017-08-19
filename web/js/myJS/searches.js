/**
 * Created by NOS on 8/15/2017.
 */
$(document).ready(function () {

    //Declaring variables
    var data_selector = $('#search');
    var criterio = 'ci';


    $('#criteria_0').change(function () {
        criterio = $(this).val();
        $('#search_input_name').addClass('hidden');
        $('#search_input_ci').removeClass('hidden');

        console.log(criterio);
    });

    $('#criteria_1').change(function () {
        criterio = $(this).val();
        $('#search_input_name').removeClass('hidden');
        $('#search_input_ci').addClass('hidden');
        console.log(criterio);
    });

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


    data_selector.click(function () {
        console.log('visto');
        if ($('#module').val() == 'bolsa') {
            var codigo = $('#search_input').val();
        } else {
            if (criterio == 'ci') {
                codigo = $('#search_input_ci').val();
            }else{
                codigo = $('#search_input_name').val();
            }
        }


        var data;

        if ($('#module').val() == 'bolsa') {
            data = {
                cod: codigo
            };
        } else {
            data = {
                cod: codigo,
                criterio: criterio
            }
        }

        $('#search_table_body').empty();
        if (codigo != '') {
            $('#empty_msg').addClass('hidden');
            $('#search_table_body').empty();
            if ($('#module').val() == 'bolsa') {
                searchUnits(data);
            } else {
                searchPatient(data);
            }

        } else {
            $('#empty_msg').removeClass('hidden');
            $('#error_msg').addClass('hidden');
            $('#error_msg_ci').addClass('hidden');
            $('#error_msg_name').addClass('hidden');
            $('#searched').addClass('hidden');
        }


    });


    function searchUnits(data) {
        $.ajax({
            type: 'get',
            url: "search/{{path('search_codigo')}}",
            data: data,
            success: function (data) {
                if (data.hasOwnProperty("response") && data.response === "success") {
                    if (data.hasOwnProperty("units")) {
                        var bolsas = JSON.parse(data.units);

                        for (i in bolsas) {
                            $('#search_table_body').append('<tr><td><h4>' + bolsas[i].codigo + '</h4></td><td><a href="show/' + bolsas[i].id + '" class="btn btn-info show_data">Datos</a>' +
                                '<a href="' + bolsas[i].id + '/edit" class="btn btn-warning show_data">Editar</a></td></tr>')
                        }
                        console.log(bolsas);
                        $('#error_msg').addClass('hidden').slideUp('slow');
                        $('#units_data').removeClass('hidden');
                    }
                } else {
                    $('#units_data').addClass('hidden').fadeOut(500);
                    $('#error_msg').removeClass('hidden').slideDown('slow');

                }

                $('#searched').removeClass('hidden');

            }

        });
    }

    function searchPatient(data) {
        $.ajax({
            type: 'get',
            url: "search/{{path('search_codigo')}}/",
            data: data,
            success: function (data) {
                if (data.hasOwnProperty("response") && data.response === "success") {
                    if (data.hasOwnProperty("units")) {
                        var patients = JSON.parse(data.units);

                        for (i in patients) {
                            $('#search_table_body').append('<tr><td><h4>' + patients[i].ciPaciente + '</h4></td>' +
                                '<td><h4>' + patients[i].nombre + '</h4></td>' +
                                '<td><h4>' + patients[i].apellidos + '</h4></td>' +
                                '<td><a href="show/' + patients[i].ci + '" class="btn btn-info show_data">Datos</a>' +
                                '<a href="' + patients[i].id + '/edit" class="btn btn-warning show_data">Editar</a></td></tr>')
                        }
                        console.log(patients);
                        $('#error_msg_ci').addClass('hidden').slideUp('slow');
                        $('#error_msg_name').addClass('hidden').slideUp('slow');
                        $('#units_data').removeClass('hidden');
                    }
                } else {
                    $('#units_data').addClass('hidden').fadeOut(500);
                    if (data.criteria == 'ci') {
                        $('#error_msg_ci').removeClass('hidden').slideDown('slow');
                    } else {
                        $('#error_msg_name').removeClass('hidden').slideDown('slow');
                    }
                }
                $('#searched').removeClass('hidden');
            }
        });
    }


});