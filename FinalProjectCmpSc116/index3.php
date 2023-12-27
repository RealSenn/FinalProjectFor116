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
      width: 195px; /* Set a fixed width for the buttons */
    }

    .container {
    max-width: 1132px;
    }
  </style>

  <title>InventiTrack - Delivery</title>
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
              <img src="res/DeliveryLogo.png" alt="Logo" width="100" height="100">
            </div>
            <h4 class="text-center">Deliveries</h4>
            <hr>
          </div>

          <!-- Add New Delivery button -->
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Add New Delivery
            </a>
          </div>

          <!-- DropDown for Menu-->
          <div class="col-md-3 float-left add-new-button">
            <div class="btn-group">
              <button type="button" class="btn btn-warning btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i> Menu
              </button>
              <div class="dropdown-menu">
                <!-- Index2 is the Inventory-->
                <a class="dropdown-item" href="index2.php">Inventory</a>
              </div>
            </div>
          </div>

          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>Delivery ID</th>
                <th>Item ID</th>
                <th>Delivery Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>View</th>
                <th>Update</th>
                <th>Completion</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $sql = "SELECT tbl_delivery.*, tbl_items.item_name
                      FROM tbl_delivery
                      INNER JOIN tbl_items ON tbl_delivery.item_id = tbl_items.item_id";

              $result = mysqli_query($conn, $sql);

              if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <tr>
                            <td data-delivery-id="<?php echo $row['delivery_id']; ?>"><?php echo $row['delivery_id']; ?></td>
                            <td data-item-id="<?php echo $row['item_id']; ?>"><?php echo $row['item_id']; ?></td>
                            <td data-delivery-date="<?php echo $row['delivery_date']; ?>"><?php echo $row['delivery_date']; ?></td>
                            <td data-quantity="<?php echo $row['quantity']; ?>"><?php echo $row['quantity']; ?></td>
                            <td data-price="<?php echo $row['price']; ?>"><?php echo $row['price']; ?></td>
                            <td data-item-name="<?php echo $row['item_name']; ?>" style="display: none;"></td>
                            <td>
                                <button type="button" class="btn btn-info viewBtn"><i class="fas fa-eye"></i> View</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning updateBtn"><i class="fas fa-edit"></i> Update</button>
                            </td>
                            <td>
                              <form action="completeDelivery.php" method="POST">
                                  <input type="hidden" name="deliveryId" value="<?php echo $row['delivery_id']; ?>">
                                  <input type="hidden" name="itemId" value="<?php echo $row['item_id']; ?>">
                                  <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                                  <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Complete Delivery</button>
                              </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger deleteBtn"><i class="fas fa-trash-alt"></i> Delete</button>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<script> alert('No Record Found');</script>";
                }
                ?>
            </tbody>
        </table>
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

  <!-- ADD DELIVERY MODAL -->
  <div class="modal fade" id="addModal">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title">Add New Delivery</h5>
                  <button class="close" data-dismiss="modal">
                      <span>&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="insert3.php" method="POST">
                      <div class="form-group">
                          <label for="item_id">Item ID</label>
                          <input type="text" name="item_id" class="form-control" placeholder="Enter Item ID" required>
                      </div>
                      <div class="form-group">
                          <label for="delivery_date">Delivery Date</label>
                          <input type="date" name="delivery_date" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="quantity">Quantity</label>
                          <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" required>
                      </div>
                      <div class="form-group">
                          <label for="price">Price per unit</label>
                          <input type="text" name="price" class="form-control" placeholder="Enter Price" required>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="insertDelivery">Save</button>
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
          <h5 class="modal-title">View Delivery Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital">
                <strong>Item ID:</strong>
            </div>
            <div class="col-sm-7 col-xs-6">
                <div id="viewitem_id"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital">
                <strong>Item Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6">
                <div id="viewitem_name"></div>
            </div>

            <div class="col-sm-5 col-xs-6 tital">
                <strong>Quantity:</strong>
            </div>
            <div class="col-sm-7 col-xs-6">
                <div id="viewquantity"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital">
                <strong>Price per unit:</strong>
            </div>
            <div class="col-sm-7 col-xs-6">
                <div id="viewprice"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital">
                        <strong>Total Price:</strong>
                    </div>
                    <div class="col-sm-7 col-xs-6">
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


  <!-- UPDATE DELIVERY MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Delivery</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="updateDelivery.php" method="POST">
            <input type="hidden" name="update_delivery_id" id="update_delivery_id">
            <div class="form-group">
              <label for="update_item_id">Item ID</label>
              <input type="text" name="update_item_id" id="update_item_id" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="update_delivery_date">Delivery Date</label>
              <input type="date" name="update_delivery_date" id="update_delivery_date" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="update_quantity">Quantity</label>
              <input type="text" name="update_quantity" id="update_quantity" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="update_price">Price per unit</label>
              <input type="text" name="update_price" id="update_price" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-warning" name="updateDelivery">Save Changes</button>
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
        <form action="delete3.php" method="POST">

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
    $('.updateBtn').on('click', function() {
      $('#updateModal').modal('show');

      // Get the table row data using data attributes
      var deliveryId = $(this).closest('tr').find('td[data-delivery-id]').data('delivery-id');
      var itemId = $(this).closest('tr').find('td[data-item-id]').data('item-id');
      var deliveryDate = $(this).closest('tr').find('td[data-delivery-date]').data('delivery-date');
      var quantity = $(this).closest('tr').find('td[data-quantity]').data('quantity');
      var price = $(this).closest('tr').find('td[data-price]').data('price');

      // Set the data in the update modal
      $('#update_delivery_id').val(deliveryId);
      $('#update_item_id').val(itemId);
      $('#update_delivery_date').val(deliveryDate);
      $('#update_quantity').val(quantity);
      $('#update_price').val(price);
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

        // Calculate total price
        var totalPrice = quantity * price;

        // Set the data in the modal
        $('#viewitem_id').html(itemId);
        $('#viewitem_name').html(itemName);
        $('#viewquantity').html(quantity);
        $('#viewprice').html(price);
        $('#viewtotal_price').html(totalPrice);
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

<!-- Script to handle Completion button actions -->
<script>
        $(document).ready(function () {
            // Handle the "Complete Delivery" button click
            $('.completeDeliveryBtn').on('click', function () {
                // Get the table row data using data attributes
                var deliveryId = $(this).data('delivery-id');
                var itemId = $(this).data('item-id');
                var quantity = $(this).data('quantity');

                // You can perform any additional actions here if needed
                console.log('Complete Delivery Clicked for Delivery ID: ' + deliveryId);

                // Now you can initiate the completion process if required
                // For example, open the update modal and fill in the data
                $('#updateModal').modal('show');
                $('#update_delivery_id').val(deliveryId);
                $('#update_item_id').val(itemId);
                $('#update_quantity').val(quantity);
            });
        });
    </script>
  
</body>

</html>