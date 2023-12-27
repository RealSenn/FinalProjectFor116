<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  
  <!-- Add your custom styles here -->
  <style>
    body {
      background-image: url('res/MainPageBackground.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      height: 75vh;
      margin: 0;
      position: relative;
      color: white; /* Set text color to white */
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

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

    .container {
    max-width: 1132px;
    }

    .head-title {
    padding-top: 12px;
    }

    h1 {
    font-size: 3.5em; /* Adjust font size for the main heading */
    }

    .lead {
      font-size: 1.5em; /* Adjust font size for lead paragraphs */
    }

    .btn-lg {
    font-size: 1.5em;
    width: 150px;
    }

    .mt-4 {
      text-align: center;
    }
  </style>

  <title>InventiTrack</title>
</head>

<body>

  <div class="overlay"></div>

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
      <!-- Add a button to open the sidebar with navbar classes -->
      <button class="btn btn-dark" onclick="openNav()">☰</button>
      <!-- Display only the company name without the logo -->
      <a class="navbar-brand" href="#">InventiTrack</a>
    </div>
  </nav>
  <br><br><br>

  <!-- Main Content -->
  <div class="container">
    <div class="main-container">
      <div class="row mt-5">
        <div class="col-md-6 offset-md-3 text-center">
          <!-- Main heading -->
          <h1>InventiTrack</h1>
          <p class="lead">Effortless Inventory Management:</p>
          <p class="lead">"Where Every Stock Has a Tale to Tell."</p>

          <!-- Buttons for Inventory and Delivery -->
          <div class="mt-4">
            <a href="index2.php" class="btn btn-primary btn-lg mr-3">Inventory</a>
            <a href="index3.php" class="btn btn-success btn-lg">Delivery</a>
          </div>

          <!-- Additional details -->
          <div class="mt-4">
            <p>Connect with us:</p>
            <!-- Add social media icons or links here -->
            <p>Email: info@yourcompany.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "230px"; // Adjust the width as needed
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
    }

  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

  
</body>

</html>
