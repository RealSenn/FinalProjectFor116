<?php

    // Insert the content of connection.php file
    include("connection.php");

    // Insert data into database
    if(isset($_POST['insertData']))
    {   
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $item_description = $_POST['item_description'];
        $category_id = $_POST['category_id'];

        $sql = "INSERT INTO tbl_items (item_name, quantity, price, item_description, category_id) VALUES('$item_name', '$quantity', '$price', '$item_description', '$category_id')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Data saved.");</script>';
            header('Location: index2.php');
        }else{
            echo '<script> alert("Data Not saved.")</script>';
        }


    }
?>