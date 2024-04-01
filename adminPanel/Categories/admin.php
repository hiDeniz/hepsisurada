<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT cid, cName, FROM Categories ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $cid = $id_rows['cid'];
        $cName = $id_rows['cName'];
        
        echo "<option value=$cid>". $cName . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>