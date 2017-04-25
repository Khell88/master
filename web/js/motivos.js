/**
 * Created by NOS on 4/20/2017.
 */
$(document).ready(function () {
    var $motivo_selector = $('.krytek_databundle_motivo');
    var $diagnostico_selector = $('.krytek_databundle_diagnosticos');
    $motivo_selector.hide();
    $diagnostico_selector.hide();

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
            url: "{{path('select_motivo')}}",
            data: data,
            success: function (data) {
                var motivos = data.motivo;
                for (i in motivos) {
                    $motivo_selector.append('<input type="radio" name="krytek_databundle_motivotransfusion[OtroSelect]" value="' + motivos[i].descripcion + '">' + motivos[i] + '</input>');
                }
            }
        });
    }


})


