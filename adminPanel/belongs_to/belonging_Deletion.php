<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT cid, pid FROM belongs_to ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $pid = $id_rows['pid'];
        $cid = $id_rows['cid'];
        echo "<option value='$pid-$cid'>". $cid . " " . $pid . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


