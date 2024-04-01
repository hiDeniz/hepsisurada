<?php 

include "config.php"; 
if (!empty($_POST['oid']) && !empty($_POST['uid'])){ 

    $oid = $_POST['oid']; 
    $uid = $_POST['uid']; 
 

    $sql_statement = "INSERT INTO give ( oid , uid) VALUES ('$oid','$uid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
