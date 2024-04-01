<?php

include "config.php";

if(!empty($_POST['aid'])){

	$aid = $_POST['aid'];
	$sql_statement = "SELECT * FROM ships_to WHERE aid = \"$aid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {

		$oid = $row['oid'];
		$sql_statement2 = "SELECT * FROM Orders WHERE oid = \"$oid\"";
		$result2 = mysqli_query($db, $sql_statement2);

		while ($row2 = $result2->fetch_assoc()) {

			echo $row2['oStatus'] . "<br>";	
		}
    }
}
?>