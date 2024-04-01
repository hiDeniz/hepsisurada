<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM Categories ORDER BY cid ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT CATEGORY</h1>
<form action="selectCategory.php" method="POST">
<select id= "cid "name="cid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult)){
    $cName = $id_rows['cName'];
    $cid = $id_rows['cid'];
    echo "<option value=$cid>" . $cName  . "</option>";
}

?>
</select>
<button>SELECT</button>
</form>