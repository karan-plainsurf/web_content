<?php
$servername = "localhost";
$username = "root";
$password = "hp123";
$dbname = "web";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}
echo 'connection Successfull';
$id=$_GET['id'];
$title = $_POST['title'];
$textarea = $_POST['textarea'];

if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE web SET title='" . $_POST['title'] . "',textarea='" . $_POST['textarea'] . "' WHERE id= '" . $_GET['id'] . "'");
    $message = "";
    header("refresh:1;url=list.php");
}
$result = mysqli_query($conn, "SELECT * FROM web WHERE id= '" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);
?>
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
                <h1 align="center" style="color: white">Web Builder</h1>

            </nav>
        </div>
        <div class="sidebar"><br><br><br><br>
            <a href="list.php"><i class="glyphicon glyphicon-list-alt"></i> List</a>
            <a href="backup.php"><i class="glyphicon glyphicon-hdd"></i> Backup</a>
        </div>
        <div class="modal-body" style="padding-left: 170px"> <br>
            <form method="POST">
                <div>
                    <?php
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>
                </div>
                <div>
                    <a href="list.php"></a>
                </div>
                <input type="hidden" name="new" value="1" />
                <div class="form-group">
                    <label>Title</label>
                    <input name="title"type="text" class="form-control" value="<?php echo $row['title']; ?>" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label type="text">Add Content</label>
                    
                    <input name="textarea" type="text"   class="form-control" value="<?php echo $row['textarea']; ?>" placeholder="Enter Content">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </body>
</html>