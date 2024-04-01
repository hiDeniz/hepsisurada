<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM Users ORDER BY uid ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT USER FOR ORDERS</h1>
<form action="selectGive.php" method="POST">
<select id= "uid "name="uid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult)){
    $uid = $id_rows['uid'];
    $uName = $id_rows['uName'];
    $uSurname = $id_rows['uSurname'];
    echo "<option value=$uid>" . $uName  . " " . $uSurname . "</option>";
}

?>
</select>
<button>SELECT</button>
</form>