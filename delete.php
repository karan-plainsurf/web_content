<?php 

$connection  = mysqli_connect('localhost','root','hp123' , 'web'); 
	

$userObj  = mysqli_query($connection , 'SELECT * FROM `web`');




if(isset($_POST['data'])){
	$dataArr = $_POST['data'] ; 

	foreach($dataArr as $id){
		mysqli_query($connection , "DELETE FROM web where id='$id'");
	}
	echo 'record deleted successfully';
}

?>