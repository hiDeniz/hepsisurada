<?php

include "config.php";

if(!empty($_POST['cid'])){

	$cid = $_POST['cid'];
	$sql_statement = "SELECT * FROM Categories WHERE cid = \"$cid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {

		$cid = $row['cid'];
		$sql_statement2 = "SELECT * FROM belongs_to WHERE cid = \"$cid\"";
		$result2 = mysqli_query($db, $sql_statement2);

		while ($row2 = $result2->fetch_assoc()) {

			$pid =  $row2['pid'];
			$sql_statement3 = "SELECT * FROM Products WHERE pid = \"$pid\"";
			$result3 = mysqli_query($db, $sql_statement3);

			while ($row3 = $result3->fetch_assoc()) {
				echo $row3['pName'] . " " . $row3['pPrice'] . "<br>";
			}	
		}
    }
}
?>