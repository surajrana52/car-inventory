<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Inventory</title>

    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assests/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assests/css/custom.css">

</head>
<body>

<?php
include('layouts/header.php');
?>

<div class="container">
    <div class="table-container">
        <table id="table" style="margin-top: 20px" class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Serial Number</th>
                <th style="display: none">id</th>
                <th>Manufacturer Name</th>
                <th>Model Name</th>
                <th>Count</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="detailModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <form id="sellModel">
                        <div class="form-row">
                            <div class="col">
                                <label>Color</label>
                                <input type="text" class="form-control" disabled id="car_color" value="">
                            </div>
                            <div class="col">
                                <label>MFG Year</label>
                                <input type="text" class="form-control" disabled id="car_mfg_year" value="">
                            </div>
                            <div class="col">
                                <label>Stock</label>
                                <input type="text" class="form-control" disabled id="car_count" value="">
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="form-row">
                            <div class="col">
                                <label>Reg No</label>
                                <input type="text" class="form-control" disabled id="car_reg_no" value="">
                            </div>
                            <div class="col">
                                <label>Note</label>
                                <input type="text" class="form-control" disabled id="car_note" value="">
                            </div>
                        </div>
                        <hr class="my-4">
                        <input type="submit" id="sellSubmit" class="btn btn-success btn-lg float-right" value="Sell">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../assests/js/jquery-3.3.1.min.js"></script>
<script src="../assests/js/bootstrap.min.js"></script>
<script src="../assests/js/jquery.dataTables.js"></script>
<script src="../assests/js/dataTables.bootstrap4.js"></script>
<script src="../assests/js/sweetalert.min.js"></script>
<script src="../assests/js/custom/view-inventory.js"></script>


</body>
</html>