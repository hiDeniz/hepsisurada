<?php
include "config.php";

$sql_command = "SELECT DISTINCT sex FROM users ORDER BY sex ASC";

$myResult = mysqli_query($db,$sql_command);
?>
<h1>USER SELECTION</h1>
<form action="select.php" method="POST">
<select name="sexs">
<?php
while($id_rows = mysqli_fetch_assoc($myResult))
    {
        $sex = $id_rows['sex'];
        echo "<option value=$sex>" . $sex  . "</option>";
    }



?>
</select>
<button>SELECT</button>

</form>