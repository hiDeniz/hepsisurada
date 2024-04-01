<?php

include "config.php";
if(!empty($_POST['sexs'])){


	$sexd = $_POST['sexs'];
	$sql_statement = "SELECT * FROM users WHERE sex = \"$sexd\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['uName'] ."  " .$row['uSurname'] . "<br>";
}
}


?>