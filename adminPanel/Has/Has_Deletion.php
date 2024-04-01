<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT aid, uid FROM Has ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $aid = $id_rows['aid'];
        $uid = $id_rows['uid'];
        echo "<option value='$aid-$uid'>". $aid . " " . $uid . "</option>";

    }

?>

</select>
<button>DELETE</button>
</form>


