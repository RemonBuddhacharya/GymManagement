<!DOCTYPE html>
<?php include("func.php"); ?>
<html>

<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <div class="row">
                    <div class="col-md-2">
                        <a href="admin-panel.php" class="btn btn-light ">Go Back</a>
                    </div>
                    <div class="col-md-10">
                        <h3>Package Details</h3>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color:#3498DB;color:#ffffff;">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Package ID </th>
                                <th>Package Name</th>
                                <th>Amounts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php get_package(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </div>
</body>

</html>