<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT pid, pcid FROM imported_from ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $pid = $id_rows['pid'];
        $pcid = $id_rows['pcid'];
        echo "<option value='$pid-$pcid'>". $pid . " " . $pcid . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


