<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Products"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $aid = $row['pid'];
    $aCity = $row['pName'];
    $pStock = $row['pStock'];
    $aCountry = $row['pAvgRating'];
    $aZipCode = $row['pPrice'];
    $aStreet = $row['pDescription'];

    echo  $pName . " " . $pPrice . " " . $pAvgRating. " " . $pStock . "<br>" ;
} 




?>