<!DOCTYPE html>
<?php include("func.php"); ?>
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
                        <h3>Register new Trainer</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body" style="background-color:grey;color:#ffffff;">
                        <form class="form-group" action="func.php" method="post">
                            <label>Trainer ID</label>
                            <input type="text" name="Trainer_id" class="form-control"><br>
                            <label>Name</label>
                            <input type="text" name="Name" class="form-control"><br>
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"><br>
                            <input type="submit" class="btn btn-primary" name="tra_submit" value="Register">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </div>
</body>

</html>