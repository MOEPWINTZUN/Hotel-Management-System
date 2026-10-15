<?php
    include("navbar.php");
    require_once("function.php");
    if (isset($_POST["updateroom"])) {

    $rid = $_POST["RoomID"];
    $hname = $_POST["HotelName"];
    $rtype = $_POST["RoomTypeName"];
    $rnum = $_POST["RoomNumber"];
    $status = $_POST["RoomStatus"];
    $floor = $_POST["FloorNumber"];
    $remarks = $_POST["Remarks"];

    updateroom($rid, $hname, $rtype, $rnum, $status, $floor, $remarks);

    header("Location: viewroom.php");
    exit();
}

    $rid = $_GET["RoomID"] ?? $_GET["id"] ?? null;
    
    $Room = viewroom($rid);


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
         <h2 class="form-title">Update <?php echo $Room[0][1]?>Details?</h2>

        <form method="post">
           <input type="hidden" name="RoomID" class="input-box"  value="<?php echo $Room[0][0];?>">
           <input type="text" name="HotelName" class="input-box" value="<?php echo $Room[0][1];?>">
           <input type="text" name="RoomTypeName" class="input-box" value="<?php echo $Room[0][2];?>">
           <input type="text" name="RoomNumber" class="input-box" value="<?php echo $Room[0][3];?>">
           <input type="text" name="RoomStatus" class="input-box" value="<?php echo $Room[0][4];?>">
           <input type="text" name="FloorNumber" class="input-box" value="<?php echo $Room[0][5];?>">
           <input type="text" name="Remarks" class="input-box" value="<?php echo $Room[0][6];?>">
           <input type="submit" name="updateroom" class="btn-submit" value="Update Room">
        </form>
    </div>
</div>
</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>