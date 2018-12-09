$(document).ready(function () {
    var table = $('.table').DataTable({
        'createdRow': function( row, data, dataIndex ) {
            $(row).attr('data-toggle', 'modal');
            $(row).attr('data-id', data[1]);
            $(row).attr('data-mfgName', data[2]);
            $(row).attr('data-mName', data[3]);
            $(row).attr('data-target', '#detailModal');
        },
        'columnDefs': [
            {
                'targets': 1,
                'visible' : false
            }
        ]
    });

    $.ajax({
        url: '../src/controllers/models/inventoryHandler.php',
        type: 'POST',
        dataType: 'json',
        data: { 'type': 'get_data' },
        success: function (data) {
            console.log(data);

            if (data.error === false) {

                $.each(data.payload, function (key, value) {

                    table.row.add([
                        key + 1,
                        value.id,
                        value.manufacturer_name,
                        value.model_name,
                        value.available_count
                    ]);

                });

                table.draw();

            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});


var record_id = 0;
var button;

$('#detailModal').on('show.bs.modal', function (event) {
     button = $(event.relatedTarget); // Button that triggered the modal
    record_id = button.data('id');
    var mfgName = button.data('mfgname');
    var mName = button.data('mname');

    var modal = $(this);
    modal.find('.modal-title').text('Details for ' + mfgName + ' ' + mName);

    $.ajax({
        url: '../src/controllers/models/inventoryHandler.php',
        type: 'POST',
        dataType: 'json',
        data: {'id' : record_id, 'type' : 'data_byId'},
        success: function (data) {
            console.log(data);

            if (data.error === false) {

                $('#car_color').val(data.payload.model_color);
                $('#car_mfg_year').val(data.payload.model_mfg_year);
                $('#car_count').val(data.payload.available_count);
                $('#car_reg_no').val(data.payload.model_reg_number);
                $('#car_note').val(data.payload.model_note);

            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

            }
        },
        error: function (e) {
            console.log(e);
        }
    });


});


$('#sellModel').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: '../src/controllers/models/inventoryHandler.php',
        type: 'POST',
        dataType: 'json',
        data: {'id' : record_id, 'type' : 'sell_model'},
        beforeSend: function () {
          $('sellSubmit').hide();
        },
        success: function (data) {
            console.log(data);

            if (data.error === false) {

                $('sellSubmit').hide();

                var current_stock = button.closest('tr').find('td:eq(3)').html();
                var new_stock = (parseInt(current_stock) - 1);
                button.closest('tr').find('td:eq(3)').html(new_stock);
                button.closest('tr').find('td:eq(3)').addClass('text-danger');

                if(new_stock === 0) {
                    button.closest('tr').remove();
                }

                $('.close').click();

                swal({
                    icon: "success",
                    text: data.message
                });



            } else {

                swal({
                    icon: "error",
                    text: data.message
                });

            }
        },
        error: function (e) {
            console.log(e);
        }
    });

});