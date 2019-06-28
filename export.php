<?php
function get_data(){
$servername = "localhost";
$username = "root";
$password = "hp123";
$dbname = "web";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query="SELECT * FROM web";
$result=  mysqli_query($conn, $query);
$array=array();
while($row = mysqli_fetch_array($result)){
    $array[]=array(
        'title' => $row['title'],
        'textarea' => $row['textarea']
    );
}
return json_encode($array);
}

$file_name = "web.json";
if(file_put_contents($file_name, get_data())){
    echo $file_name.'File Created';
    header("refresh:1;url=backup.php");
}
else{
    echo "Error In Creating Json File";
}
?>

