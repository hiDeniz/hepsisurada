<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT aid, aCity, aCountry, aZipCode, aStreet  FROM Addresses ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $aid = $id_rows['aid'];
        $aCity = $id_rows['aCity'];
        $aCountry = $id_rows['aCountry'];
        $aZipCode = $id_rows['aZipCode'];
        $aStreet = $id_rows['aStreet'];
        echo "<option value=$aid>". $aCountry . " " . $aCity . " " . $aStreet. " " . $aZipCode . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>