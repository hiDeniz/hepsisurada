<?php 

include "config.php"; 
if (!empty($_POST['ccName']) && !empty($_POST['ccCost'])){ 

    $ccName = $_POST['ccName']; 
    $ccCost = $_POST['ccCost']; 

    $sql_statement = "INSERT INTO CargoCompany (ccName, ccCost) VALUES ('$ccName', '$ccCost')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
