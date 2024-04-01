<?php

include "config.php";

if(!empty($_POST['aCity'])){

	$aCity = $_POST['aCity'];
	$sql_statement = "SELECT * FROM Addresses WHERE aCity = \"$aCity\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['aZipCode'] . "  " .$row['aStreet'] . "  " .$row['aCountry'] . "<br>";
	}
}

?>

<?php

include "config.php";

if(!empty($_POST['aCountry'])){

	$aCountry = $_POST['aCountry'];
	$sql_statement = "SELECT * FROM Addresses WHERE aCountry = \"$aCountry\"";
	$result = mysqli_query($db, $sql_statement);
	while ($row = $result->fetch_assoc()) {
    echo $row['aZipCode'] . "  " .$row['aStreet'] . "  " .$row['aCity'] . "<br>";
	}
}

?>
