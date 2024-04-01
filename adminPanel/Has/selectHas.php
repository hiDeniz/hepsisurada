<?php

include "config.php";

if(!empty($_POST['uid'])){

	$uid = $_POST['uid'];
	$sql_statement = "SELECT * FROM Has WHERE uid = \"$uid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {

		$aid = $row['aid'];
		$sql_statement2 = "SELECT * FROM Addresses WHERE aid = \"$aid\"";
		$result2 = mysqli_query($db, $sql_statement2);

		while ($row2 = $result2->fetch_assoc()) {
			echo  $row2['aCountry'] . " " . $row2['aCity'] . " " . $row2['aStreet'] . " " .$row2['aZipCode'] . "<br>";	
		}
    }
}