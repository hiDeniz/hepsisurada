<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT aid, oid FROM Ships_to ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $aid = $id_rows['aid'];
        $oid = $id_rows['oid'];
        echo "<option value='$aid-$oid'>". $aid . " " . $oid . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


