<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include "config.php"; 
?>

<form action="insertCart.php" method="POST"> 
    User Id: 
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
    <br>
    <br>
     Product Id: 
    <!-- Dropdown menu for ccid -->
    <select id="pid" name="pid">
    <?php
    $query = "SELECT pid, pName FROM Products";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['pid'] . ">"  . $row['pName'] . '</option>';
    }

    ?>
    </select>
    <br>
    <br>
    Amount: 
    <input type="text" id="amount" name="amount">
    <br>
    <br>
    <input type="submit" value="Submit"> 
</form> 

