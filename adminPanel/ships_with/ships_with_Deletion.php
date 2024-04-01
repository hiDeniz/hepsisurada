<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT ccid, oid FROM Ships_with ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $ccid = $id_rows['ccid'];
        $oid = $id_rows['oid'];
        echo "<option value='$ccid-$oid'>". $ccid . " " . $oid . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


