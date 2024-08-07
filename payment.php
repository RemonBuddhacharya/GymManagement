<!DOCTYPE html>
<?php 
session_start();
include("func.php"); ?>
<html>

<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body" style="background-color:darkgrey;color:#ffffff;">
                <div class="row">
                    <div class="col-md-2">
                        <a href="admin-panel.php" class="btn btn-light ">Go Back</a>
                    </div>
                    <div class="col-md-10">
                        <h3>Payment Details</h3>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color:grey;color:#ffffff;">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Payment ID </th>
                                <th>Amount</th>
                                <th>Payment Type</th>
                                <th>Customer</th>
                                <th>Package Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php get_payment(); ?>
                        </tbody>
                    </table>
                    <?php
                    if($_SESSION['type'] == 'admin'){
                    echo '
                        <div class="card-body" style="background-color:darkgrey;color:FFFFFF;">
                            <h3>Make new Payment</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-group" action="func.php" method="post">
                                <label>Amount</label>
                                <input type="text" name="Amount" class="form-control"><br>
                                <label>Customer ID</label>
                                <input type="text" name="customer_id" class="form-control"><br>
                                <label>Customer Name</label>
                                <input type="text" name="customer_name" class="form-control"><br>
                                <label>Payment Type</label>
                                <input type="text" name="payment_type" class="form-control"><br>
                                <input type="submit" class="btn btn-primary" name="pay_submit" value="PAY">
                            </form>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </div>
</body>

</html>