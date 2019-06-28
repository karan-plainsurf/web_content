<?php

session_start();
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


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $textarea = $_POST['textarea'];
    
    $_SESSION['message']="Record Saved Successfully";
    $_SESSION['msg_type']="sucess";

    $query = "INSERT INTO web(title,textarea) VALUES('$title','$textarea')";
    if (mysqli_query($conn, $query)) {
        echo "records saved successfully";
    } else {
        echo 'not saved';
    }
    header("location:/list.php", 301);
}
?>