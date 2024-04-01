
<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT uid, uName, uSurname FROM users";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $uid = $id_rows['uid'];
        $uName = $id_rows['uName'];
        $uSurname = $id_rows['uSurname'];
        echo "<option value=$uid>". $uName . " " . $uSurname . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>