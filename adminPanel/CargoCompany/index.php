<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM CargoCompany"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $ccid = $row['ccid'];
    $ccName = $row['ccName'];
    $ccCost = $row['ccCost'];

    echo  $ccName . " " . $ccCost . "<br>" ;
} 




?>