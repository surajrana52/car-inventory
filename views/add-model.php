<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Model</title>

    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assests/css/custom.css">

</head>
<body>

<?php
include('layouts/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="jumbotron">
                <form id="newModel">
                    <h1 class="display-4">Add New Model</h1>
                    <p class="lead">Please fill all the details below</p>
                    <div class="form-row">
                        <div class="col">
                            <select id="mfg" name="car_mfg" class="form-control">
                                <option>Select Manufacturer</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="car_model_name" placeholder="Model Name">
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="car_color" placeholder="Car Color">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="car_mfg_year" placeholder="Year of MFG">
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="car_reg_no" placeholder="Registration Number">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="car_note"
                                   placeholder="Note: Available for sale">
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Image One</label>
                            <input type="file" name="car_image_one" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Image Two</label>
                            <input type="file" name="car_image_two" class="form-control">
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="btn btn-success btn-lg float-right" href="#" role="button">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="../assests/js/jquery-3.3.1.min.js"></script>
<script src="../assests/js/bootstrap.min.js"></script>
<script src="../assests/js/sweetalert.min.js"></script>

<script>
    $(document).ready(function (e) {
        console.log("hello");
        //swal("Hello world!");
    });
</script>

</body>
</html>