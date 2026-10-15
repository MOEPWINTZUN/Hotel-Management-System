<?php
    include("navbar.php");
    require_once("function.php");
    if (isset($_POST["updatebooking"])) {

    $bid = $_POST["BookingID"];
    $GuestID = $_POST["GuestID"];
    $roomid = $_POST["RoomID"];
    $cindate = $_POST["CheckInDate"];
    $coutdate = $_POST["CheckOutDate"];
    $bookdate = $_POST["BookingDate"];
    $num = $_POST["NumberOfGuest"];
    $amt = $_POST["TotalAmount"];
    $status = $_POST["BookingStatus"];
    $pay = $_POST["PaymentMethod"];
    $req = $_POST["SpecialRequests"];

    updatebooking($bid, $GuestID, $roomid, $cindate, $coutdate, $bookdate, $num, $amt, $status, $pay, $req);

    header("Location: viewbooking.php");
    exit();
}

    $bid = $_GET["BookingID"] ?? $_GET["id"] ?? null;
    
    $Booking = viewbooking($bid);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body>

    <div class="hotel">
        
    

     <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>


    <div class="form">
         <h2 class="form-title">Update <?php echo $Booking[0][1]?>Details?</h2>

        <form method="post">
           <input type="hidden" name="BookingID" class="input-box"  value="<?php echo $Booking[0][0];?>">
           <input type="text" name="GuestID" class="input-box" value="<?php echo $Booking[0][1];?>">
           <input type="text" name="RoomID" class="input-box" value="<?php echo $Booking[0][2];?>">
           <input type="text" name="CheckInDate" class="input-box" value="<?php echo $Booking[0][3];?>">
           <input type="text" name="CheckOutDate" class="input-box" value="<?php echo $Booking[0][4];?>">
           <input type="text" name="BookingDate" class="input-box" value="<?php echo $Booking[0][5];?>">
           <input type="number" name="NumberOfGuest" class="input-box" value="<?php echo $Booking[0][6];?>">
           <input type="number" min="0" step= "0.01" name="TotalAmount" class="input-box" value="<?php echo $Booking[0][7];?>">
           <input type="text" name="BookingStatus" class="input-box" value="<?php echo $Booking[0][8];?>">
           <input type="text" name="PaymentMethod" class="input-box" value="<?php echo $Booking[0][9];?>">
           <input type="text" name="SpecialRequests" class="input-box" value="<?php echo $Booking[0][10];?>">
           <input type="submit" name="updatebooking" class="btn-submit" value="Update Booking">
        </form>
    </div>
</div>
</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>