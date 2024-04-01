<?php
// Establish a database connection
include "config.php";
$userID = 1;
$addressID = 7;
// Start a MySQL transaction
$beginTransaction = mysqli_query($db, "BEGIN");


// Check if the transaction started successfully
if (!$beginTransaction) {
    // If the transaction failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert("Error: Could not start the transaction.");
    exit;
}

// Insert data into the orders table
$insertOrders = mysqli_query($db, "
INSERT INTO orders (oStatus, ccid)
VALUES ('pending', FLOOR(1 + RAND() * 3));
");

// Check if the query was successful
if (!$insertOrders) {
    // If the query failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert("Error: Could not insert data into the orders table.");
    exit;
}

// Set the @last_insert_id variable to the ID of the newly inserted row in the orders table
$lastInsertId = mysqli_insert_id($db);

// Insert data into the consists_of table
$insertConsistsOf = mysqli_query($db, "
INSERT INTO consists_of (oid, pid, amount)
SELECT $lastInsertId, pid, amount
FROM add_to_shoppingcart
WHERE uid = $userID

");

// Check if the query was successful
if (!$insertConsistsOf) {
    // If the query failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert("Error: Could not insert data into the consists_of table.");
    exit;
}


// Insert data into the give table
$insertGive = mysqli_query($db, "
INSERT INTO give (oid, uid)
VALUES ($lastInsertId, $userID)
");

// Check if the query was successful
if (!$insertGive) {
    // If the query failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert("Error: Could not insert data into the give table.");
    exit;
}






// Insert data into the ships_to table
$insertShipsTo = mysqli_query($db, "
INSERT INTO ships_to (oid, aid)
VALUES ($lastInsertId, $addressID)
");

// Check if the query was successful
if (!$insertShipsTo) {
    // If the query failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert ("Error: Could not insert data into the ships_to table.");
    exit;
}

// Delete data from the add_to_shoppingcart table
$deleteFromShoppingcart = mysqli_query($db, "
DELETE FROM add_to_shoppingcart
WHERE uid = $userID
");

// Check if the query was successful
if (!$deleteFromShoppingcart) {
    // If the query failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert("Error: Could not delete data from the add_to_shoppingcart table.");
    exit;
}

// If all queries were successful, commit the transaction
$commitTransaction = mysqli_query($db, "COMMIT");

// Check if the transaction was committed successfully
if (!$commitTransaction) {
    // If the transaction failed, rollback and display an error message
    mysqli_query($db, "ROLLBACK");
    alert ("Error: Could not commit the transaction.");
    exit;
}

// Display a success message
echo "Your order has been placed. Thank you for shopping with us!";

?>