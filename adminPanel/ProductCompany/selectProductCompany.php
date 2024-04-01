<?php

include "config.php";

if(!empty($_POST['pcNation'])){

	$pcNation = $_POST['pcNation'];
	$sql_statement = "SELECT * FROM ProductCompany WHERE pcNation = \"$pcNation\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['pcName'] . "<br>";
    }
}

?>

<?php

include "config.php";

if(!empty($_POST['pcid'])){

	$pcid = $_POST['pcid'];
	$sql_statement = "SELECT * FROM imported_from WHERE pcid = \"$pcid\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
		$pid = $row['pid'];
		$sql_statement2 = "SELECT * FROM Products WHERE pid = \"$pid\"";
		$result2 = mysqli_query($db, $sql_statement2);
		while ($row2 = $result2->fetch_assoc()) {
			echo $row2['pName'] . "<br>";
		}
    }
}

?>