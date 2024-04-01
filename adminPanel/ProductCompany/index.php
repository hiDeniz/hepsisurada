<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM ProductCompany"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $aid = $row['pcid'];
    $aCity = $row['pcName'];
    $aCountry = $row['pcNation'];
    echo  $pcName . "<br>" ;
} 




?>