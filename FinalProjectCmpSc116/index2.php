<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .navbar {
      z-index: 1;
    }

    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 2;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar-content {
      position: absolute;
      top: 60px; /* Adjust the top position to match the padding-top of the sidebar */
      left: 0;
      width: 100%; /* Adjust the width of the sidebar content */
      padding: 20px;
      box-sizing: border-box;
      color: white;
    }

    .sidebar a {
      padding: 8px 8px 8px 10px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sidebar a:hover {
      color: #f1f1f1;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 0; /* Adjust the right position to move it to the right */
      font-size: 27px;
      width: 40px;
      height: 40px;
      margin-right: 0px; /* Optional: Add margin for better visual appearance */
      padding: 10px;
    }

    .sidebar-button {
    display: block;
    padding: 4px 6px; /* Adjust the padding to make the button smaller */
    border: 2px solid #333;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    color: #818181;
    transition: 0.3s;
  }

  .sidebar-button:hover {
    color: #f1f1f1;
    border-color: #555;
  }

    /* Custom styles for the navbar and button */
    .navbar-brand {
      margin-right: auto; /* Set margin-right to auto for the "InventiTrack" brand */
    }

    .btn-info {
      margin-left: 0; /* Adjust the left margin */
    }

    .add-new-button {
      width: 160px; /* Set a fixed width for the buttons */
    }

    .container {
    max-width: 1132px;
    }
  </style>

  <title>InventiTrack - Inventory</title>
</head>

<body>

  <!-- Sidebar -->
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <div class="sidebar-content">
      <a href="DevPage.php" class="sidebar-button">Developer/s</a>
      <a href="#" class="sidebar-button">Link2</a>
    </div>
  </div>
  
   <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <button class="btn btn-dark" onclick="openNav()">☰</button>
      <a class="navbar-brand" href="index.php">InventiTrack</a>
    </div>
  </nav>
  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <!-- Centering the logo above the title -->
            <div class="text-center">
              <img src="res/InvLogoFinal.jpg" alt="Logo" width="100" height="100">
            </div>
            <h4 class="text-center">Delivery</h4>
            <hr>
          </div>

          <!-- Add New Item button -->
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Add New Item
            </a>
          </div>

          <!-- DropDown for Menu-->
          <div class="col-md-3 float-left add-new-button">
            <div class="btn-group">
              <button type="button" class="btn btn-warning btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i> Menu
              </button>
              <div class="dropdown-menu">
                <!-- Index3 is the Delivery-->
                <a class="dropdown-item" href="index3.php">Delivery</a>
              </div>
            </div>
          </div>
          
          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
 
                <?php

                    $sql = "SELECT * FROM tbl_items";
                    $result = mysqli_query($conn, $sql);
                  
                  if($result)
                  {
                    while($row = mysqli_fetch_assoc($result)){
                      ?>
                      <tr>
                          <td data-item-id="<?php echo $row['item_id']; ?>"><?php echo $row['item_id']; ?></td>
                          <td data-item-name="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></td>
                          <td data-quantity="<?php echo $row['quantity']; ?>"><?php echo $row['quantity']; ?></td>
                          <td data-price="<?php echo $row['price']; ?>"><?php echo $row['price']; ?></td>
                          <td data-item-description="<?php echo $row['item_description']; ?>" style="display: none;"></td>
                          <td data-category="<?php echo $row['category_id']; ?>" style="display: none;"></td>
                          <td>
                              <button type="button" class="btn btn-info viewBtn"><i class="fas fa-eye"></i> View</button>
                          </td>
                          <td>
                              <button type="button" class="btn btn-warning updateBtn"><i class="fas fa-edit"></i> Update</button>
                          </td>
                          <td>
                              <button type="button" class="btn btn-danger deleteBtn"><i class="fas fa-trash-alt"></i> Delete</button>
                          </td>
                      </tr>

                      <?php
                       }
                    }else{
                      echo "<script> alert('No Record Found');</script>";
                    }
                    ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "230px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }
  </script>

  <!-- Your existing scripts for modals, jQuery, Bootstrap, etc. -->

</body>

</html>

  <!-- MODALS -->

  <!-- ADD ITEM MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add New Item</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert2.php" method="POST">
            <div class="form-group">
              <label for="title">Item Name</label>
              <input type="text" name="item_name" class="form-control" placeholder="Enter Item Name" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Quantity</label>
              <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Price</label>
              <input type="text" name="price" class="form-control" placeholder="Enter Price" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="item_description">Item Description</label>
              <textarea name="item_description" class="form-control" placeholder="Enter Item Description"></textarea>
            </div>
            <div class="form-group">
              <label for="title">Caterogry</label>
              <input type="text" name="category_id" class="form-control" placeholder="Enter Category" maxlength="50"
                required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View Item Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Item Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewitem_name"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Quantity:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewquantity"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Price:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewprice"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Item Description:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewitem_description"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Category:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewcategory_id"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Total Price:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewtotal_price"></div>
            </div>        
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Item</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update2.php" method="POST">
            <input type="hidden" name="updateitem_id" id="updateitem_id">
            <div class="form-group">
              <label for="updateitem_name">Item Name</label>
              <input type="text" name="updateitem_name" id="updateitem_name" class="form-control" placeholder="Enter Item Name" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="updatequantity">Quantity</label>
              <input type="text" name="updatequantity" id="updatequantity" class="form-control" placeholder="Enter Quantity" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="updateprice">Price</label>
              <input type="text" name="updateprice" id="updateprice" class="form-control" placeholder="Enter Price" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="updateitem_description">Item Description</label>
              <textarea name="updateitem_description" id="updateitem_description" class="form-control" placeholder="Enter Item Description"></textarea>
            </div>
            <div class="form-group">
              <label for="updatecategory_id">Category</label>
              <input type="text" name="updatecategory_id" id="updatecategory_id" class="form-control" placeholder="Enter Category" maxlength="50" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="delete2.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteitem_id" id="deleteitem_id">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


  <!-- insert script here to toggle update button -->
  <script>
    $(document).ready(function() {
  $('.updateBtn').on('click', function(){
    $('#updateModal').modal('show');

    // Get the table row data using data attributes
    var itemId = $(this).closest('tr').find('td[data-item-id]').data('item-id');
    var itemName = $(this).closest('tr').find('td[data-item-name]').data('item-name');
    var quantity = $(this).closest('tr').find('td[data-quantity]').data('quantity');
    var price = $(this).closest('tr').find('td[data-price]').data('price');
    var itemDescription = $(this).closest('tr').find('td[data-item-description]').data('item-description');
    var category = $(this).closest('tr').find('td[data-category]').data('category');
    
    // Set the data in the update modal
    $('#updateitem_id').val(itemId);
    $('#updateitem_name').val(itemName);
    $('#updatequantity').val(quantity);
    $('#updateprice').val(price);
    $('#updateitem_description').val(itemDescription);
    $('#updatecategory_id').val(category);
  });
});

</script>

<!-- insert script here to toggle view button -->
<script>
      $(document).ready(function() {
  $('.viewBtn').on('click', function() {
    $('#viewModal').modal('show');

    // Get the table row data using data attributes
    var itemId = $(this).closest('tr').find('td[data-item-id]').data('item-id');
    var itemName = $(this).closest('tr').find('td[data-item-name]').data('item-name');
    var quantity = $(this).closest('tr').find('td[data-quantity]').data('quantity');
    var price = $(this).closest('tr').find('td[data-price]').data('price');
    var itemDescription = $(this).closest('tr').find('td[data-item-description]').data('item-description');
    var category = $(this).closest('tr').find('td[data-category]').data('category');
    
    // Calculate total price (assuming quantity and price are numeric)
    var totalPrice = parseFloat(quantity) * parseFloat(price);

    // Set the data in the modal
    $('#viewitem_name').html(itemName);
    $('#viewquantity').html(quantity);
    $('#viewprice').html(price);
    $('#viewitem_description').html(itemDescription);
    $('#viewcategory_id').html(category);
    $('#viewtotal_price').html(totalPrice.toFixed(2)); // Adjust the decimal places as needed
  });
});

  </script>

<!-- insert script here to toggle delete button -->
<script>
  $(document).ready(function(){
    $('.deleteBtn').on('click', function(){

      $('#deleteModal').modal('show');

      //Get the table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);

      $('#deleteitem_id').val(data[0]);

      });

  });
</script>
  
</body>

</html>