<?php

include "config.php";

if(!empty($_POST['pid'])){

	$pid = $_POST['pid'];
	$sql_statement = "SELECT * FROM Products WHERE pid = \"$pid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {

		$pid = $row['pid'];
		$sql_statement2 = "SELECT * FROM make_Reviews WHERE pid = \"$pid\"";
		$result2 = mysqli_query($db, $sql_statement2);

		while ($row2 = $result2->fetch_assoc()) {

			$uid = $row2['uid'];
			$sql_statement3 = "SELECT * FROM Users WHERE uid = \"$uid\"";
			$result3 = mysqli_query($db, $sql_statement3);

			while ($row3= $result3->fetch_assoc()) {
				echo $row3['uName'] . " " . $row3['uSurname'] . " " . $row2['rComment'] . " " . $row2['rRating'] . " " . $row2['rDate'] . "<br>";

			}
		}
    }
}
?>

<?php

include "config.php";

if(!empty($_POST['uid'])){

	$uid = $_POST['uid'];
	$sql_statement = "SELECT * FROM Users WHERE uid = \"$uid\"";
	$result = mysqli_query($db, $sql_statement);

	while ($row = $result->fetch_assoc()) {

		$uid = $row['uid'];
		$sql_statement2 = "SELECT * FROM make_Reviews WHERE uid = \"$uid\"";
		$result2 = mysqli_query($db, $sql_statement2);

		while ($row2 = $result2->fetch_assoc()) {

			$pid = $row2['pid'];
			$sql_statement3 = "SELECT * FROM Products WHERE pid = \"$pid\"";
			$result3 = mysqli_query($db, $sql_statement3);

			while ($row3= $result3->fetch_assoc()) {
				echo $row3['pName'] . " " . $row2['rComment'] . " " . $row2['rRating'] . " " . $row2['rDate'] . "<br>";
			}
		}
    }
}
?>