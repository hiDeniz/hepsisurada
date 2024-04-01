<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Categories"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $cid = $row['cid'];
    $cName = $row['cName'];
    echo  $cName . "<br>" ;
} 




?>