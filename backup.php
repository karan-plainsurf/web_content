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
        <div style="padding-left: 170px"><br><br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>

                <?php
                $conn = new mysqli("localhost", "root", "hp123", "web");
                if ($conn->connect_error) {
                    die("Connection Failed" . $conn->connect_error);
                }
                $query = "SELECT id,title ,textarea from web";
                $result = $conn->query($query);
                //if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr id="<?php echo $row['id'] ?>">
                        <td><?php echo$row['id']?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['textarea'] ?></td>
                    </tr>


                <?php } ?>
            </table>
        </div>

        <div class="container" style="padding-left: 100px">
           
            <a href="import_main.php" type="submit" class="btn btn-primary">Import</a>
                <a href="export.php" type="submit" class="btn btn-primary"> Export</a>

          
    </div>
    </body>
</html>
