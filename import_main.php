<?php
$connect = mysqli_connect("localhost", "root", "hp123", "web"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "webb.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $array = json_decode($data, true); //Convert JSON String into PHP Array
          foreach($array as $row) //Extract the Array Values by using Foreach Loop
          {
           $query .= "INSERT INTO web(id, title, textarea) VALUES ('".$row["id"]."', '".$row["title"]."', '".$row["textarea"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["title"].'</td>
       <td>'.$row["textarea"].'</td>
      </tr>
           '; //Data for display on Web page
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
              header('location:list.php');
          }




          ?>