<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT ccid, ccName, ccCost FROM CargoCompany ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $ccid = $id_rows['ccid'];
        $ccName = $id_rows['ccName'];
        $ccCost = $id_rows['ccCost'];
        echo "<option value=$ccid>". $ccName . " " . $ccCost . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>