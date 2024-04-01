<?php 

include "config.php";

$costLower = $_POST['costLower'];
$costUpper = $_POST['costUpper'];

if (empty($_POST['costLower'])){
	$costLower = 0.0;
}
if (empty($_POST['costUpper'])){
	$costUpper = 1000000000.0;
}

$sql_command = "SELECT * FROM CargoCompany WHERE ccCost >= $costLower AND ccCost <= $costUpper";
$result = mysqli_query($db, $sql_command);

while ($row = $result->fetch_assoc()) 
{
	echo $row['ccName'] ."  " .$row['ccCost'] . "<br>";
}

?>