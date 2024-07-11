<!DOCTYPE html>
<?php include ("func.php"); ?>
<html>

<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body>

    <div class="modal fade" id="membermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Member Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="code.php" class="form" method="POST" id="form" autocomplete="off">
                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstname" placeholder="First Name"
                                aria-label="default input example" name="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="lastname" placeholder="Last Name"
                                aria-label="default input example" name="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Trainer Id</label>
                            <input type="text" class="form-control" id="trainer" aria-describedby="emailHelp"
                                name="trainer">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="update-member">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body" style="background-color:darkgrey;color:#ffffff;">
                <div class="row">
                    <div class="col-md-2">
                        <a href="admin-panel.php" class="btn btn-light ">Go Back</a>
                    </div>
                    <div class="col-md-4">
                        <h3>Members Details</h3>
                    </div>
                    <div class="col-md-6">
                        <form class="form-group" action="trainer_search.php" method="post">
                            <div class="row">
                                <div class="col-md-9"><input type="text" name="search" class="form-control"
                                        placeholder="enter contact"></div>
                                <div class="col-md-3"><input type="submit" name="member_search_submit"
                                        class="btn btn-light" value="Search"> </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body" style="background-color:grey;color:#ffffff;">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email id</th>
                                <th>Trainer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php get_member_details(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    </div>

    <script>
        $(document).ready(function () {
            $('.editbtn').on('click', function () {
                $('#membermodal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[3]);
                $('#firstname').val(data[0]);
                $('#lastname').val(data[1]);
                $('#email').val(data[2]);
                $('#trainer').val(data[4]);
            });
        });
    </script>
</body>

</html>