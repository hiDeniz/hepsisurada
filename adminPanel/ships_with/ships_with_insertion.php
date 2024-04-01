<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="ships_withInsertion.php" method="POST">

<!-- Dropdown menu for ccid -->
<select id="ccid" name="ccid">
<?php
$query = "SELECT * FROM Ships_with NATURAL JOIN CargoCompany";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['ccid'] . '">' . $row['ccName'] . '</option>';
}


?>
</select>

<!-- Dropdown menu for oid -->
<select id="oid" name="oid">
<?php
$query = "SELECT * FROM Ships_with NATURAL JOIN Orders";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['oid'] . '">' . $row['oid'] . '</option>';
}

?>

</select>


<button>INSERT</button>
</form> 


