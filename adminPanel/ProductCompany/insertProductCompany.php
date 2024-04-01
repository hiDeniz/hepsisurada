<?php 

include "config.php"; 
if (!empty($_POST['pcName']) && !empty($_POST['pcNation'])){ 

    $pcName = $_POST['pcName']; 
    $pcNation = $_POST['pcNation']; 

    $sql_statement = "INSERT INTO ProductCompany (pcName, pcNation) VALUES ('$pcName', '$pcNation')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
