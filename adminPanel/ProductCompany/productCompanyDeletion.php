<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

include "config.php";

?>

<form action="delete.php" method="POST">
<select name="ids">

<?php

$sql_command = "SELECT pcid , pcName, pcNation FROM ProductCompany ";

$myresult = mysqli_query($db, $sql_command);

    while($id_rows = mysqli_fetch_assoc($myresult))
    {
        $pcid = $id_rows['pcid'];
        $pcName = $id_rows['pcName'];
        $pcNation = $id_rows['pcNation'];
        echo "<option value=$pcid>". $pcName . " " . $pcNation . "</option>";
    }

?>

</select>
<button>DELETE</button>
</form>


  