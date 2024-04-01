<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM Products ORDER BY pid ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT PRODUCT FOR REVIEWS</h1>
<form action="selectReview.php" method="POST">
<select id= "pid" name="pid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult)) {
    $pName = $id_rows['pName'];
    $pid = $id_rows['pid'];
    echo "<option value=$pid>" . $pName  . "</option>";
}

?>
</select>
<button>SELECT</button>
</form>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM Users ORDER BY uid ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT USER FOR REVIEWS</h1>
<form action="selectReview.php" method="POST">
<select id= "uid" name="uid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult)) {
    $uName = $id_rows['uName'];
    $uSurname = $id_rows['uSurname'];
    $uid = $id_rows['uid'];
    echo "<option value=$uid>" . $uName  . " " . $uSurname . "</option>";
}

?>
</select>
<button>SELECT</button>
</form>