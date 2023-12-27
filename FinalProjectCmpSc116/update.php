<?php

    // Insert the content of connection.php file
    include('connection.php');

    // Update data into the database
    if(isset($_POST['updateData']))
    {
        $id = $_POST['updateId'];
        $firstname = $_POST['updateFirstname'];
        $lastname = $_POST['updateLastname'];
        $address = $_POST['updateAddress'];
        $skills = $_POST['updateSkills'];
        $program = $_POST['updateProgram'];

        $sql = "UPDATE tbl_items SET  firstname = '$firstname',
                                        lastname = '$lastname',
                                        address = '$address',
                                        skills = '$skills',
                                        program = '$program'
                                        WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location: index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }