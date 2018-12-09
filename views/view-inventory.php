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
        <table id="example" style="margin-top: 20px" class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="../assests/js/jquery-3.3.1.min.js"></script>
<script src="../assests/js/bootstrap.min.js"></script>
<script src="../assests/js/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</body>
</html>