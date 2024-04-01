<?php 

include "config.php";

$priceLower = $_POST['priceLower'];
$priceUpper = $_POST['priceUpper'];
$ratingLower = $_POST['ratingLower'];
$ratingUpper = $_POST['ratingUpper'];

if (empty($_POST['priceLower'])){
	$priceLower = 0.0;
}
if (empty($_POST['priceUpper'])){
	$priceUpper = 1000000000.0;
}

if (empty($_POST['ratingLower'])){
	$ratingLower = 0.0;
}
if (empty($_POST['ratingUpper'])){
	$ratingUpper = 10.0;
}

$sql_command = "SELECT * FROM Products WHERE pPrice >= $priceLower AND pPrice <= $priceUpper AND pAvgRating  >= $ratingLower AND pAvgRating <= $ratingUpper";
$result = mysqli_query($db, $sql_command);

while ($row = $result->fetch_assoc()) 
{
	echo $row['pName'] ."  " .$row['pPrice'] . "  " .$row['pAvgRating'] . "  " .$row['pStock'] . "<br>";
}

?>