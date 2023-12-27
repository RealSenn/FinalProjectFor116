<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Delete the data from DB
    if(isset($_POST['deleteData']))
    {
        $item_id = $_POST['deleteitem_id'];

        $sql = "DELETE FROM tbl_items WHERE item_id = '$item_id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: index2.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }

?>