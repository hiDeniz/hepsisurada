<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM Addresses"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $aid = $row['aid'];
    $aCity = $row['aCity'];
    $aCountry = $row['aCountry'];
    $aZipCode = $row['aZipCode'];
    $aStreet = $row['aStreet'];
    echo  $aCountry . " " . $aCity . " " . $aStreet. " " . $aZipCode . "<br>" ;
} 




?>