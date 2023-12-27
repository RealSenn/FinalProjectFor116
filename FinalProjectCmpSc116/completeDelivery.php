<?php
include('connection.php');

if (isset($_POST['deliveryId'])) {
    $deliveryId = $_POST['deliveryId'];
    $itemId = $_POST['itemId'];
    $quantity = $_POST['quantity'];

    // Update tbl_items with the delivered quantity
    $updateItemsQuery = "UPDATE tbl_items SET quantity = quantity + '$quantity' WHERE item_id = '$itemId'";

    if (mysqli_query($conn, $updateItemsQuery)) {
        // Delete the delivery record
        $deleteQuery = "DELETE FROM tbl_delivery WHERE delivery_id = '$deliveryId'";

        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script>alert('Delivery marked as completed, updated in tbl_items, and deleted from tbl_delivery.');</script>";
            header('Location: index3.php');
            exit();
        } else {
            echo "<script>alert('Error deleting delivery.');</script>";
        }
    } else {
        echo "<script>alert('Error updating tbl_items.');</script>";
    }
}

mysqli_close($conn);
?>
