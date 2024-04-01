<?php 

include "config.php"; 

if (!empty($_POST['pName']) && !empty($_POST['pStock']) &&!empty($_POST['pAvgRating']) &&!empty($_POST['pPrice']) &&!empty($_POST['pDescription']) &&!empty($_POST['cid']) &&!empty($_POST['pcid'])){ 

    $pName = $_POST['pName']; 
    $pStock = $_POST['pStock']; 
    $pAvgRating = $_POST['pAvgRating']; 
    $pPrice = $_POST['pPrice']; 
    $pDescription = $_POST['pDescription']; 
    $cid = $_POST['cid']; 
    $pcid = $_POST['pcid']; 


    $sql_statement = "INSERT INTO Products (pName, pStock, pAvgRating, pPrice, pDescription) VALUES ('$pName', '$pStock', '$pAvgRating','$pPrice','$pDescription')";
    $result1 = mysqli_query($db, $sql_statement);
    $addedProductId= mysqli_insert_id($db);
    $sql_statement2 = "INSERT INTO imported_from ( pid , pcid) VALUES ('$addedProductId','$pcid')"; 
    $result2 = mysqli_query($db, $sql_statement2);
    $sql_statement3 = "INSERT INTO belongs_to ( pid , cid) VALUES  ('$addedProductId','$cid')";
    $result3 = mysqli_query($db, $sql_statement3);

    if ($result1 && $result2 && $result3) {
        echo "All three queries were successful.";
    }
} 
else 
{
    echo "You did not enter one of the inputs!";
}

?>
