<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT  *  FROM add_to_ShoppingCart NATURAL JOIN Users NATURAL JOIN Products";


$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $amount = $id_rows['amount'];

        $pid = $id_rows['pid'];

        $uid = $id_rows['uid'];

        $pName = $id_rows['pName'];

        $uName = $id_rows['uName'];

        echo "<option value='$pid-$uid'>". $pName . " ". $uName . " " . $amount . "</option>";
}
        

?>

</select>
<button>DELETE</button>
</form>


