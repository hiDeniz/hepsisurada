<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM users"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $uName = $row['uName']; 
    $uSurname = $row['uSurname']; 
    $age = $row['age']; 
    echo $uName . " " . $uSurname . " " . $age . "<br>"; 
} 

?>