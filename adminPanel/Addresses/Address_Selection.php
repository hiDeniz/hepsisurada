<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT aCountry FROM Addresses ORDER BY aCountry ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT COUNTRY</h1>
<form action="selectAdress.php" method="POST">
<select name="aCountry">
<?php

while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCountry = $id_rows['aCountry'];
        echo "<option value=$aCountry>" . $aCountry  . "</option>";
    }

?>
</select>
<button>SELECT</button>
</form>

<?php
include "config.php";

$sql_command = "SELECT DISTINCT aCity FROM Addresses ORDER BY aCity ASC";
$myResult = mysqli_query($db,$sql_command);
?>
<h1>SELECT CITY</h1>
<form action="selectAdress.php" method="POST">
<select name="aCity">
<?php

while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $aCity = $id_rows['aCity'];
        echo "<option value=$aCity>" . $aCity  . "</option>";
    }

?>
</select>
<button>SELECT</button>
</form>