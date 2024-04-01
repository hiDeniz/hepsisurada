<?php 

include "config.php"; 
if (!empty($_POST['rRating']) && !empty($_POST['rComment']) &&!empty($_POST['rDate']) &&!empty($_POST['uid']) &&!empty($_POST['pid'])){ 

    $rRating = $_POST['rRating']; 
    $rComment = $_POST['rComment']; 
    $rDate = $_POST['rDate']; 
    $uid = $_POST['uid']; 
    $pid = $_POST['pid']; 
 

    $sql_statement = "INSERT INTO make_Reviews (rRating, rComment , rDate , uid , pid) VALUES ('$rRating', '$rComment', '$rDate','$uid','$pid')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
