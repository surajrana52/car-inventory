<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Manufacturer</title>

    <link rel="stylesheet" href="../assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assests/css/custom.css">

</head>
<body>

<?php
include('layouts/header.php');
?>

<div class="container">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <div class="jumbotron">
                <form>
                    <h1 class="display-4">Add New Manufacturer</h1>
                    <p class="lead">Please type the manufacturer name</p>


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Eg: Hyundai">
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