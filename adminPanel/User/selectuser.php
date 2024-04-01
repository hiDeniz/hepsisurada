<?php 

include "config.php";



$ageLower = $_POST['ageLower'];
$ageUpper = $_POST['ageUpper'];
$radioValue;
if (!empty($_POST["myRadio"])){
	$radioValue = $_POST["myRadio"];
}
else{
	$radioValue = "";
}


if (empty($_POST['ageLower'])){
	$ageLower = 0;
}
if (empty($_POST['ageUpper'])){
	$ageUpper = 200;
}

$sql_command = "SELECT * FROM Users WHERE uAge < $ageUpper AND uAge > $ageLower";

if($radioValue == "MALE"){
	$sql_command = "SELECT * FROM Users WHERE uAge < $ageUpper AND uAge > $ageLower AND uSex = \"male\"";

}
if($radioValue == "FEMALE"){
	$sql_command = "SELECT * FROM Users WHERE uAge < $ageUpper AND uAge > $ageLower AND uSex = \"female\"";
}

$result = mysqli_query($db, $sql_command);
while ($row = $result->fetch_assoc()) 
{
	echo $row['uName'] ."  " .$row['uSurname'] . "<br>";
}




?>