<?php
    include("function.php");


   if (isset($_POST['createbook'])) 
    {
        $gname = $_POST['GuestF_Name'];
        $rnum = $_POST['RoomNumber'];
        $cidate = $_POST['CheckInDate'];
        $codate = $_POST['CheckOutDate'];
        $bdate = $_POST['BookingDate'];
        $numofg = $_POST['NumberOfGuest'];
        $tamount = $_POST['TotalAmount'];
        $bstatus = $_POST['BookingStatus'];
        $payment = $_POST['PaymentMethod'];
        $specialr = $_POST['SpecialRequests'];

      addbooking($gname, $rnum, $cidate, $codate, $bdate, $numofg, $tamount, $bstatus, $payment, $specialr);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Booking</title>
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

        <h2 class="form-title">Create a Booking</h2>

        <form method="POST">
            <div class="row-select">
              <?php dropdownguest(); ?>

              <?php dropdownroom(); ?>

          </div>
          
            

            <input type="date" name="CheckInDate" class="input-box" placeholder="CheckInDate" required>

            <input type="date" name="CheckOutDate" class="input-box" placeholder="CheckOutDate" required>

            <input type="date" name="BookingDate" class="input-box" placeholder="BookingDate" required>

            <input type="number" name="NumberOfGuest" class="input-box" placeholder="NumberOfGuest" required>

            <input type="number" name="TotalAmount" min="0" step= "0.01" class="input-box" placeholder="TotalAmount " required>

            <input type="text" name="BookingStatus" class="input-box" placeholder="BookingStatus" required>

            <input type="text" name="PaymentMethod" class="input-box" placeholder="PaymentMethod" required>

            <input type="text" name="SpecialRequests" class="input-box" placeholder="SpecialRequests" required>


            <button type="submit" name="createbook" class="btn-submit">
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