<?php
    include("function.php");


   if (isset($_POST['createRoom'])) 
    {
        $honame = $_POST['HotelName'];
        $rtypename = $_POST['RoomTypeName'];
        $rnum = $_POST['RoomNumber'];
        $rstatus = $_POST['RoomStatus'];
        $fnum = $_POST['FloorNumber'];
        $remarks = $_POST['Remarks'];

      addroom($honame, $rtypename, $rnum, $rstatus, $fnum, $remarks);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Room </title>
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

        <h2 class="form-title">Create a Room</h2>

        <form method="POST">
            <?php dropdownhotel(); ?>

            <?php dropdownroomtype(); ?>

            <input type="number" name="RoomNumber" class="input-box" placeholder="Room Number" required>

            <input type="text" name="RoomStatus" class="input-box" placeholder="RoomStatus" required>

            <input type="number" name="FloorNumber" class="input-box" placeholder="FloorNumber" required>

            <input type="text" name="Remarks" class="input-box" placeholder="Remarks" required>


            <button type="submit" name="createRoom" class="btn-submit">
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