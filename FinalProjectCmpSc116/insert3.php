<?php
include("connection.php");

if (isset($_POST['insertDelivery'])) {
    // Retrieve form data
    $item_id = $_POST['item_id'];
    $delivery_date = $_POST['delivery_date'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Check if the specified item ID exists in tbl_items
    $checkItemQuery = "SELECT COUNT(*) AS itemExists FROM tbl_items WHERE item_id = '$item_id'";
    $checkItemResult = mysqli_query($conn, $checkItemQuery);
    $itemExists = mysqli_fetch_assoc($checkItemResult)['itemExists'];

    if ($itemExists > 0) {
        // Item ID exists, proceed with the insertion
        $insertQuery = "INSERT INTO tbl_delivery (item_id, delivery_date, quantity, price) VALUES ('$item_id', '$delivery_date', '$quantity', '$price')";
    
        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Delivery added successfully.');</script>";
            header('Location: index3.php');
        } else {
            echo "<script>alert('Error adding delivery. Please try again.');</script>";
        }
    } else {
        // Item ID does not exist, display an error message and redirect back to index3.php
        echo "<script>
                alert('Item ID does not exist. Please enter a valid Item ID.');
                window.location.href = 'index3.php';
             </script>";
    }
    
}

mysqli_close($conn);
?>
