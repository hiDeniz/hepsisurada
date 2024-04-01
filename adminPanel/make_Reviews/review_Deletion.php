<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT  pid, uid, rRating, rComment, rDate FROM make_Reviews ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $uid = $id_rows['uid'];
        $pid = $id_rows['pid'];
        $rRating = $id_rows['rRating'];
        $rComment = $id_rows['rComment'];
        $rDate = $id_rows['rDate'];

        echo "<option value='$pid-$uid'>". $rRating . " " . $rComment . " " . $rDate  . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


