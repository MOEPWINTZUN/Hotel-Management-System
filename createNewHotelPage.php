    <?php
    include("function.php");


   if (isset($_POST['createHotel'])) 
    {
        $hname = $_POST['HotelName'];
        $haddress = $_POST['HotelAddress'];
        $city = $_POST['City'];
        $pcode = $_POST['PostCode'];
        $telNo = $_POST['Hotel_telNo'];

      addhotel($hname, $haddress, $city, $pcode, $telNo);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Hotel</title>
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

        <h2 class="form-title">Create a Hotel</h2>

        <form method="POST">

            <input type="text" name="HotelName" class="input-box" placeholder="Hotel Name" required>

            <input type="text" name="HotelAddress" class="input-box" placeholder="Hotel Address">

            <input type="text" name="City" class="input-box" placeholder="City" required>

            <input type="text" name="PostCode" class="input-box" placeholder="Postcode" required>

            <input type="text" name="Hotel_telNo" class="input-box" placeholder="Telephone Number" required>

            <button type="submit" name="createHotel" class="btn-submit">
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