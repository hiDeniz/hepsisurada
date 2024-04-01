<?php 

include "config.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM add_to_ShoppingCart"; 

$result = mysqli_query($db, $sql_statement); // Executing query

while($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $uid = $row['uid'];
    $pid = $row['pid'];
    $amount = $row['amount'];
    $sql = "SELECT * FROM Users WHERE id = uid";
    $sql2 = "SELECT * FROM Products WHERE id = pid";

    echo  $sql['uName'] . " " . $sql['pName'] . "<br>" ;
} 




?>