<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT pcNation FROM ProductCompany ORDER BY pcNation ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT COUNTRY</h1>
<form action="selectProductCompany.php" method="POST">
<select name="pcNation">
<?php

while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $pcNation = $id_rows['pcNation'];
        echo "<option value=$pcNation>" . $pcNation  . "</option>";
    }

?>
</select>
<button>SELECT</button>
</form>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT * FROM ProductCompany ORDER BY pcid ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT COMPANY</h1>
<form action="selectProductCompany.php" method="POST">
<select id= "pcid" name="pcid">
<?php

while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $pcName = $id_rows['pcName'];
        $pcid = $id_rows['pcid'];
        echo "<option value=$pcid>" . $pcName  . "</option>";
    }

?>
</select>
<button>SELECT</button>
</form>