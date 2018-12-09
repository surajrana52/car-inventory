$('#newModel').on('submit', function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '../src/controllers/models/modelsHandler.php',
        type: 'POST',
        dataType: 'json',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#modelSubmit').hide();
        },
        success: function (data) {
            console.log(data);

            if (data.error === false) {

                swal({
                    icon: "success",
                    text: data.message
                });

                $('#modelSubmit').show();
                $('#newModel')[0].reset();

            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

                $('#modelSubmit').show();

            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});

$(document).ready(function (e) {

    $.ajax({
        url: '../src/controllers/models/getManufacturers.php',
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $('#modelSubmit').hide();
        },
        success: function (data) {

            if (data.error === false) {
                $.each(data.payload, function(key, value) {
                    $('#mfg').append( new Option(value.manufacturer_name, value.id) );
                });

                $('#modelSubmit').show();

            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

                $('#modelSubmit').show();

            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});