$('#newMfg').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: '../src/controllers/manufacturer/manufacturerHandler.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function () {
            $('#mfgSubmit').hide();
        },
        success: function (data) {
            console.log(data);

            if (data.error === false) {

                swal({
                    icon: "success",
                    text: data.message
                });

                $('#mfgSubmit').show();
                $('#newMfg')[0].reset();

            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

                $('#mfgSubmit').show();

            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});