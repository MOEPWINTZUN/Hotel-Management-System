<?php
    include("navbar.php");
    require_once("function.php");

    if(isset($_POST["deletebooking"]))
    {
       $bid= $_POST["BookingID"];
       deletebooking($bid);
       header("Location: viewbooking.php");
    }

    $bid = $_GET["BookingID"] ?? $_GET["id"] ?? null;
    $booking = viewbooking($bid);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Booking</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body class="hotel">

 <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>

    <div class="form">
        <h2 class="form-title">Delete <?php echo $booking[0][1]?>Delete Booking?</h2>
    
    <div class="main">
        <form method="post">
           <input type="hidden" name="BookingID" class="input-box" value="<?php echo $booking[0][0];?>">
           <input type="number" name="GuestID" class="input-box" value="<?php echo $booking[0][1];?>">
           <input type="number" name="RoomID" class="input-box" value="<?php echo $booking[0][2];?>">
           <input type="date" name="CheckInDate" class="input-box" value="<?php echo $booking[0][3];?>">
           <input type="date" name="CheckOutDate" class="input-box" value="<?php echo $booking[0][4];?>">
           <input type="date" name="BookingDate" class="input-box" value="<?php echo $booking[0][5];?>">
           <input type="number" name="NumberOfGuest" class="input-box" value="<?php echo $booking[0][6];?>">
           <input type="number" min="0" step= "0.01" name="TotalAmount" class="input-box" value="<?php echo $booking[0][7];?>">
           <input type="text" name="BookingStatus" class="input-box" value="<?php echo $booking[0][8];?>">
           <input type="text" name="PaymentMethod" class="input-box" value="<?php echo $booking[0][9];?>">
           <input type="text" name="SpecialRequests" class="input-box" value="<?php echo $booking[0][10];?>">
           <input type="submit" name="deletebooking" value="Delete Booking" class="btn-submit">
        </form>
    </div>
</div>

</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>