<?php 

include "config.php"; 
if (!empty($_POST['uName']) && !empty($_POST['uSurname']) &&  !empty($_POST['uAge']) && !empty($_POST['uEmail']) && !empty($_POST['uPhoneNumber']) && !empty($_POST['uSex']) ){ 

    $uName = $_POST['uName']; 
    $uSurname = $_POST['uSurname']; 
    $age = $_POST['uAge'];
    $e_mail = $_POST['uEmail'];
    $phoneNumber = $_POST['uPhoneNumber'];
    $sex = $_POST['uSex']; 

    $sql_statement = "INSERT INTO Users(uName, uSurname, uAge, uEmail, uPhoneNumber, uSex) VALUES ('$uName', '$uSurname' ,$age ,'$e_mail','$phoneNumber', '$sex')"; 


    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
