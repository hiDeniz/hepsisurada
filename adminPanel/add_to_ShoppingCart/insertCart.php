<?php 

include "config.php"; 
if (!empty($_POST['uid']) && !empty($_POST['pid']) &&!empty($_POST['amount']) &&!empty($_POST['uid']) &&!empty($_POST['pid'])){ 

    $uid = $_POST['uid']; 
    $pid = $_POST['pid']; 
    $amount = $_POST['amount']; 

    $sql_statement = "INSERT INTO add_to_ShoppingCart (amount, uid , pid) VALUES ('$amount', '$uid', '$pid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
