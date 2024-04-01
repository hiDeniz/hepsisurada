<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM Users";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT USER FOR SHOPPING CART</h1>
<form action="selectShoppingCart.php" method="POST">
<select id="uid" name="uid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult)) {
    $uid = $id_rows['uid'];
    echo "<option value=$uid>" . $id_rows['uName'] . " " . $id_rows['uSurname'] . "</option>";
}

?>
</select>
<button>SELECT</button>
</form>