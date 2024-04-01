<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT  oid, oStatus FROM Orders ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $oid = $id_rows['oid'];
        $oStatus = $id_rows['oStatus'];

        echo "<option value='$oid'>". $oStatus  . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


