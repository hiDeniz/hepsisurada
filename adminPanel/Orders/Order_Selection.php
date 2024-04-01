<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
include "config.php"; 
?>

<h1>SELECT ADDRESS FOR ORDER STATUS</h1>

<form action="selectOrder.php" method="POST"> 
    <select id="aid" name="aid">
    <?php
    $query = "SELECT aid, aCity, aCountry, aZipCode, aStreet FROM Addresses";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['aid'] . ">"  . $row['aCountry'] . " " . $row['aCity'] . " " . $row['aStreet'] . " " .$row['aZipCode'] . '</option>';
    }

    ?>
    </select>
    <button>SELECT</button>
    </form>