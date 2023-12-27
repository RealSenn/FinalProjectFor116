<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Delete the data from DB
    if(isset($_POST['deleteData']))
    {
        $id = $_POST['deleteId'];

        $sql = "DELETE FROM tbl_Items WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: index.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }

?>