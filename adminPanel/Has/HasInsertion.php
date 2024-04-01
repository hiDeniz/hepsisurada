<?php 

include "config.php"; 
if (!empty($_POST['aid']) && !empty($_POST['uid'])){ 

    $aid = $_POST['aid']; 
    $uid = $_POST['uid']; 
 

    $sql_statement = "INSERT INTO Has ( aid , uid) VALUES ('$aid','$uid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
