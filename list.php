<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Web Builder</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/custom.css">

    </head>
    <body>
        <div>
            <nav class="navbar navbar-inverse bgcolor">
                <h1 align="center">
                    <a href="index.php" style="color: white">Web Builder</a>
                </h1>
            </nav>
        </div>
        <div class="sidebar"><br><br><br><br>
            <a href="list.php"><i class="glyphicon glyphicon-list-alt"></i> List</a>
            <a href="backup.php"><i class="glyphicon glyphicon-hdd"></i> Backup</a>
        </div>
        <div class="container" style="padding-left: 100px">
            <a href="add.php" class="btn btn-primary glyphicon-plus">Add</a>
        </div>
        <br>
        <div style="padding-left: 170px">
            <table id="productTable" class="table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="checkAll">
                        </th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli("localhost", "root", "hp123", "web");
                    if ($conn->connect_error) {
                        die("Connection Failed" . $conn->connect_error);
                    }
                    $query = "SELECT title ,textarea,id from web";
                    $result = $conn->query($query);
                    //if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr id="<?php echo $row['id'] ?>">
                            <td><input class="checkbox" type="checkbox" id="<?php echo $row['id'] ?>" name="id[]"></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['textarea'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div>
                <a type="button" id="delete" class="btn btn-danger">Delete Selected</a>

            </div>
        </div>
    </body>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#checkAll').click(function () {
                if (this.checked) {
                    $('.checkbox').each(function () {
                        this.checked = true;
                    });
                } else {
                    $('.checkbox').each(function () {
                        this.checked = false;
                    });
                }
            });


            /*$(".remove").click(function () {
             var id = $(this).parents("tr").attr("id");
             
             
             if (confirm('Are you sure to remove this record ?'))
             {
             $.ajax({
             url: '/delete.php',
             type: 'GET',
             data: {id: id},
             error: function () {
             alert('Something is wrong');
             },
             success: function (data) {
             $("#" + id).remove();
             alert("Record removed successfully");
             }
             });
             }
             });*/

            $('#delete').click(function () {
                var dataArr = new Array();
                if ($('input:checkbox:checked').length > 0) {
                    $('input:checkbox:checked').each(function () {
                        dataArr.push($(this).attr('id'));
                        $(this).closest('tr').remove();
                    });
                    sendResponse(dataArr)
                } else {
                    alert('No record selected ');
                }

            });


            function sendResponse(dataArr) {
                $.ajax({
                    type: 'post',
                    url: 'delete.php',
                    data: {'data': dataArr},
                    success: function (response) {
                        alert(response);
                    },
                    error: function (errResponse) {
                        alert(errResponse);
                    }
                });
            }

        });
    </script>
</html>
