<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include "config.php"; 
?>

<form action="HasInsertion.php" method="POST"> 
    Has Address: 
  
    <!-- Dropdown menu for aid -->
    <select id="aid" name="aid">
    <?php
    $query = "SELECT aid, aCity, aCountry, aZipCode, aStreet FROM Addresses";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['aid'] . ">"  . $row['aCountry'] . " " . $row['aCity'] . " " . $row['aStreet'] . " " .$row['aZipCode'] . '</option>';
    }

    ?>
    </select>
    <br>
    <br>

    Has User: 
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

