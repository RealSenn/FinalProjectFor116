<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(isset($_POST['updateData']))
    {
        $item_id = $_POST['updateitem_id'];
        $item_name = $_POST['updateitem_name'];
        $quantity = $_POST['updatequantity'];
        $price = $_POST['updateprice'];
        $item_description = $_POST['updateitem_description'];
        $category_id = $_POST['updatecategory_id'];

        $sql = "UPDATE tbl_items SET  item_name = '$item_name',
                                        quantity = '$quantity',
                                        price = '$price',
                                        item_description = '$item_description',
                                        category_id = '$category_id'
                                        WHERE item_id = '$item_id'";

        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location: index2.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }