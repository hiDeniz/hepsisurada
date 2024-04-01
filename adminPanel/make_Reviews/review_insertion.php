<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
include "config.php"; 
?>
<form action="insertReviews.php" method="POST"> 
    Review Rating: 
    <input type="text" id="rRating" name="rRating">
    <br>
    <br>
     Review Comment: 
    <input type="text" id="rComment" name="rComment">
    <br>
    <br>
    Review Date: 
    <input type="text" id="rDate" name="rDate">
    <br>
    <br>
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
    <input type="submit" value="Submit"> 
</form> 

