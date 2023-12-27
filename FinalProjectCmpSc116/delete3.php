<?php
include("connection.php");

if (isset($_POST['deleteData'])) {
    $deleteDeliveryID = $_POST['deleteitem_id'];

    // Delete the delivery record
    $deleteQuery = "DELETE FROM tbl_delivery WHERE delivery_id = '$deleteDeliveryID'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Delivery deleted successfully.');</script>";
    } else {
        echo "<script>alert('Error deleting delivery.');</script>";
    }

    // Redirect to index3.php
    header('Location: index3.php');
    exit();
}

mysqli_close($conn);
?>
