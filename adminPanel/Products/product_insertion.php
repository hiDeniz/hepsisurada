<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 

include "config.php";

?>
<form action="insertProduct.php" method="POST"> 
    Product Name: 
    <input type="text" id="pName" name="pName">
    <br>
    <br>
    Stock of the Product: 
    <input type="text" id="pStock" name="pStock">
    <br>
    <br>
    Average Rating of the Product: 
    <input type="text" id="pAvgRating" name="pAvgRating">
    <br>
    <br>
    Product Price: 
    <input type="text" id="pPrice" name="pPrice">
    <br>
    <br>
    Product Description: 
    <input type="text" id="pDescription" name="pDescription">
    <br>
    <br>
    </select>

    <!-- Dropdown menu for cid -->
    <select id="cid" name="cid">
    <?php
    $query = "SELECT cid, cName FROM Categories";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['cid'] . ">"  . $row['cName'] . '</option>';
    }

    ?>
    </select>

     <!-- Dropdown menu for pcid -->
    <select id="pcid" name="pcid">
    <?php
    $query = "SELECT pcid, pcName FROM ProductCompany";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['pcid'] . ">" . $row['pcName'] . '</option>';
    }
    ?>
    </select>

    <br>
    <br>
    <input type="submit" value="Submit"> 
</form> 