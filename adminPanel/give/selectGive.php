<?php

include "config.php";

if(!empty($_POST['uid'])){

	$uid = $_POST['uid'];
	$sql_statement = "SELECT * FROM Give WHERE uid = \"$uid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {
		$oid = $row['oid'];
		$sql_statement2 = "SELECT * FROM Orders WHERE oid = \"$oid\"";
		$result2 = mysqli_query($db, $sql_statement2);
		while ($row2 = $result2->fetch_assoc()) {
			$ccid = $row2['ccid'];
			$sql_statement3 = "SELECT * FROM CargoCompany WHERE ccid = \"$ccid\"";
			$result3 = mysqli_query($db, $sql_statement3);
			while ($row3 = $result3->fetch_assoc()) {
				$sql_statement4 = "SELECT * FROM Ships_to WHERE oid = \"$oid\"";
				$result4 = mysqli_query($db, $sql_statement4);
				while ($row4 = $result4->fetch_assoc()) {
					$aid = $row4['aid'];
					$sql_statement5 = "SELECT * FROM Addresses WHERE aid = \"$aid\"";
					$result5 = mysqli_query($db, $sql_statement5);
					while ($row5 = $result5->fetch_assoc()) {
						echo $row5['aCity'] . " " . $row5['aCountry'] . " " . $row3['ccName'] . " " . $row2['oStatus'] . "<br>";
					}
				}
			}
		}
    }
}