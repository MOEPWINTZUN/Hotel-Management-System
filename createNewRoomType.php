<?php
    include("function.php");


   if (isset($_POST['createRoomType'])) 
    {
        $rname = $_POST['RoomTypeName'];
        $price = $_POST['PricePerNight'];
        $maxo = $_POST['maxOccupancy'];
        $amenities = $_POST['amenities'];
        $des = $_POST['Description'];

      addRoomType($rname, $price, $maxo, $amenities, $des);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Room Type</title>
    <link rel="stylesheet" href="style.css" />
</head>
<header class="nav">
  <div class="logo">S&M Hotel <i class="fa-solid fa-hotel"></i></div>

  <nav class="menu">

    <div class="dropdown">
      <button class="dropbtn">Hotel ▾</button>
      <div class="dropdown-content">
        <a href="createNewHotelPage.php">Create New Hotel</a>
        <a href="viewhotel.php">View Hotel</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Room ▾</button>
      <div class="dropdown-content">
        <a href="createRoom.php">Create New Room</a>
        <a href="viewroom.php">View Room</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Room Type ▾</button>
      <div class="dropdown-content">
        <a href="createNewRoomType.php">Create New Room Type</a>
        <a href="viewroomtype.php">View Room Type</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Guest ▾</button>
      <div class="dropdown-content">
        <a href="createNewGuest.php">Create New Guest</a>
        <a href="viewguest.php">View Guest</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Booking ▾</button>
      <div class="dropdown-content">
        <a href="createNewBooking.php">Create New Booking</a>
        <a href="viewbooking.php">View Booking</a>
      </div>
    </div>

  </nav>
</header>

<body>


      <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>


    <div class="form">

        <h2 class="form-title">Create a Room Type</h2>

        <form method="POST">

            <input type="text" name="RoomTypeName" class="input-box" placeholder="Room Type Name" required>

            <input type="number" min="12.0" max="500.0" step="0.5" name="PricePerNight" class="input-box" placeholder="Price Per Night">

            <input type="number" min="0.0" max="500.0" step="0.5" name="maxOccupancy" class="input-box" placeholder="MaxOccupancy" required>

            <input type="text" name="amenities" class="input-box" placeholder="Amenities" required>

            <input type="text" name="Description" class="input-box" placeholder="Description" required>

            <button type="submit" name="createRoomType" class="btn-submit">
                Continue
            </button>

        </form>

    </div>
</div>
</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>