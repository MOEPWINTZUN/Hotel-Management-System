<?php
    include("navbar.php");
    require_once("function.php");

    if(isset($_POST["deleteroomtype"]))
    {
       $rtid= $_POST["RoomTypeID"];
       deleteroomtype($rtid);
       header("Location: viewroomtype.php");
    }

    $rtid = $_GET["RoomTypeID"] ?? $_GET["id"] ?? null;
    $roomtype = viewroomtype($rtid);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete RoomType</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body class="hotel">

 <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>

    <div class="form">
        <h2 class="form-title">Delete <?php echo $roomtype[0][1]?>Delete RoomType?</h2>
    
    <div class="main">
        <form method="post">
           <input type="hidden" name="RoomTypeID" class="input-box" value="<?php echo $roomtype[0][0];?>">
           <input type="text" name="RoomTypeName" class="input-box" value="<?php echo $roomtype[0][1];?>">
           <input type="number" name="PricePerNight" class="input-box" value="<?php echo $roomtype[0][2];?>">
           <input type="number" name="maxOccupancy" class="input-box" value="<?php echo $roomtype[0][3];?>">
           <input type="text" name="amenities" class="input-box" value="<?php echo $roomtype[0][4];?>">
           <input type="text" name="Description" class="input-box" value="<?php echo $roomtype[0][5];?>">
           <input type="submit" name="deleteroomtype" value="Delete Room Type" class="btn-submit">
        </form>
    </div>
</div>

</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>