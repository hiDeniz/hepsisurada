<?php 

include "config.php"; 
if (!empty($_POST['oid']) && !empty($_POST['oStatus']) &&!empty($_POST['ccid']) &&!empty($_POST['aid'])){ 

    $oid = $_POST['oid']; 
    $oStatus = $_POST['oStatus']; 
    $ccid = $_POST['ccid'];
    $aid = $_POST['aid'];


    $sql_statement = "INSERT INTO Orders (oid, oStatus, ccid) VALUES ('$oid', '$oStatus', '$ccid')"; 
    $result1 = mysqli_query($db, $sql_statement);
    $addedProductId= mysqli_insert_id($db);
    $sql_statement3= "INSERT INTO Ships_to ( aid , oid) VALUES ('$aid','$addedProductId')";
    $result3 = mysqli_query($db, $sql_statement3);

    if ($result1 && $result3) {
        echo "All two queries were successful.";
    }

} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
