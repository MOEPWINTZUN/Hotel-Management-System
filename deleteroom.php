<?php
    include("navbar.php");
    require_once("function.php");

    if(isset($_POST["deleteroom"]))
    {
       $rid= $_POST["RoomID"];
       deleteroom($rid);
       header("Location: viewroom.php");
    }

    $rid = $_GET["RoomID"] ?? $_GET["id"] ?? null;
    $room = viewroom($rid);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Room</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body class="hotel">

 <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>

    <div class="form">
        <h2 class="form-title">Delete <?php echo $room[0][1]?>Delete Room?</h2>
    
    <div class="main">
        <form method="post">
           <input type="hidden" name="RoomID" class="input-box" value="<?php echo $room[0][0];?>">
           <input type="text" name="HotelName" class="input-box" value="<?php echo $room[0][1];?>">
           <input type="text" name="RoomTypeName" class="input-box" value="<?php echo $room[0][2];?>">
           <input type="number" name="RoomNumber" class="input-box" value="<?php echo $room[0][3];?>">
           <input type="text" name="RoomStatus" class="input-box" value="<?php echo $room[0][4];?>">
           <input type="number" name="FloorNumber" class="input-box" value="<?php echo $room[0][5];?>">
           <input type="text" name="Remarks" class="input-box" value="<?php echo $room[0][6];?>">
           <input type="submit" name="deleteroom" value="Delete Room" class="btn-submit">
        </form>
    </div>
</div>

</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>