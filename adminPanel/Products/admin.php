<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT pid, pName, pStock, pAvgRating, pPrice, pDescription  FROM Products ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $pid = $id_rows['pid'];
        $pName = $id_rows['pName'];
        $pStock = $id_rows['pStock'];
        $pAvgRating = $id_rows['pAvgRating'];
        $pPrice = $id_rows['pPrice'];
        $pDescription = $id_rows['pDescription'];
        echo "<option value=$pid>". $pName . " " . $pStock . " " . $pAvgRating . " " . $pPrice. " " . $pDescription . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>