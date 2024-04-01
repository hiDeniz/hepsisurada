<?php 

include "config.php"; 
if (!empty($_POST['aCity']) && !empty($_POST['aCountry']) &&  !empty($_POST['aZipCode']) && !empty($_POST['aStreet'])){ 

    $aCity = $_POST['aCity']; 
    $aCountry = $_POST['aCountry']; 
    $aZipCode = $_POST['aZipCode'];
    $aStreet = $_POST['aStreet'];


    $sql_statement = "INSERT INTO Addresses (aCity, aCountry, aZipCode, aStreet) VALUES ('$aCity', '$aCountry' ,$aZipCode ,'$aStreet')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
