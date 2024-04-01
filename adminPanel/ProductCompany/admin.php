<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT pcid, pcName, pcNation FROM ProductCompany ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $aid = $id_rows['pcid'];
        $aCity = $id_rows['pcName'];
        $aCountry = $id_rows['pcNation'];
        echo "<option value=$pcid>". $pcName . " " . $pcNation . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>