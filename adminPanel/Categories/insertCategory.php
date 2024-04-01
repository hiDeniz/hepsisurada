<?php 

include "config.php"; 
if ( !empty($_POST['cName'])){ 

    $cName = $_POST['cName']; 

    $sql_statement = "INSERT INTO Categories (cName) VALUES ('$cName')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
