<?php 

include "config.php"; 
if (!empty($_POST['pid']) && !empty($_POST['pcid'])){ 

    $pid = $_POST['pid']; 
    $pcid = $_POST['pcid']; 
 

    $sql_statement = "INSERT INTO imported_from ( pid , pcid) VALUES ('$pid','$pcid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
