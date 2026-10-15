<?php
    include("function.php");


   if (isset($_POST['createGuest'])) 
    {
        $gfname = $_POST['GuestF_Name'];
        $glname = $_POST['GuestL_Name'];
        $gender = $_POST['Gender'];
        $dobb = $_POST['DateOfBirth'];
        $email = $_POST['Email'];
        $phnum = $_POST['Phnumber'];
        $address = $_POST['Address'];
        $nation = $_POST['Nationality'];

      addguest($gfname, $glname, $gender, $dobb, $email, $phnum, $address, $nation);
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

        <h2 class="form-title">Create a Guest</h2>

        <form method="POST">

            <input type="text" name="GuestF_Name" class="input-box" placeholder="Guest First Name" required>

            <input type="text" name="GuestL_Name" class="input-box" placeholder="Guest Last Name" required>

            <input type="text" name="Gender" class="input-box" placeholder="Gender" required>

            <input type="date" name="DateOfBirth" class="input-box" placeholder="DateOfBirth" required>

            <input type="email" name="Email" class="input-box" placeholder="Email" required>

            <input type="text" name="Phnumber" class="input-box" placeholder="Phnumber" required>

            <input type="text" name="Address" class="input-box" placeholder="Address" required>

            <input type="text" name="Nationality" class="input-box" placeholder="Nationality" required>

            <button type="submit" name="createGuest" class="btn-submit">
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