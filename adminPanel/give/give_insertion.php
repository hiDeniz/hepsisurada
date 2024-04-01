<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include "config.php"; 
?>
<form action="giveInsertion.php" method="POST"> 
    Give Order id: 
    <!-- Dropdown menu for ccid -->
    <select id="oid" name="oid">
    <?php
    $query = "SELECT oid FROM Orders";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['oid'] . ">"  . $row['oid'] . '</option>';
    }

    ?>
    </select>
  
    <br>
    <br>
    Give User : 
    <!-- Dropdown menu for ccid -->
    <select id="uid" name="uid">
    <?php
    $query = "SELECT uid, uName FROM Users";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['uid'] . ">"  . $row['uName'] . '</option>';
    }

    ?>
    </select>
    
    <input type="submit" value="Submit"> 
</form> 

