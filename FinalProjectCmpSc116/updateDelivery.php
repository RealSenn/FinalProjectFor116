<?php
include("connection.php");

if (isset($_POST['updateDelivery'])) {
    $updateDeliveryID = $_POST['update_delivery_id'];
    $updateItemID = $_POST['update_item_id'];
    $updateDeliveryDate = $_POST['update_delivery_date'];
    $updateQuantity = $_POST['update_quantity'];
    $updatePrice = $_POST['update_price'];

    // Update the delivery record
    $updateQuery = "UPDATE tbl_delivery 
                    SET item_id = '$updateItemID', 
                        delivery_date = '$updateDeliveryDate', 
                        quantity = '$updateQuantity', 
                        price = '$updatePrice' 
                    WHERE delivery_id = '$updateDeliveryID'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Delivery updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating delivery.');</script>";
    }

    // Redirect to index3.php
    header('Location: index3.php');
    exit();
}

mysqli_close($conn);
?>
