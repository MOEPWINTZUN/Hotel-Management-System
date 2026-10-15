<?php
    include("navbar.php");
    require_once("function.php");
    if (isset($_POST["updateroomtype"])) {

    $rtid = $_POST["RoomTypeID"];
    $rtname = $_POST["RoomTypeName"];
    $ppn = $_POST["PricePerNight"];
    $moc = $_POST["maxOccupancy"];
    $am = $_POST["amenities"];
    $desc = $_POST["Description"];

    updateroomtype($rtid, $rtname, $ppn, $moc, $am, $desc);

    header("Location: viewroomtype.php");
    exit();
}

    $rtid = $_GET["RoomTypeID"] ?? $_GET["id"] ?? null;
    
    $RoomType = viewroomtype($rtid);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update RoomType</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body>

    <div class="hotel">
        
    

     <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>


    <div class="form">
         <h2 class="form-title">Update <?php echo $RoomType[0][1]?>Details?</h2>

        <form method="post">
           <input type="hidden" name="RoomTypeID" class="input-box"  value="<?php echo $RoomType[0][0];?>">
           <input type="text" name="RoomTypeName" class="input-box" value="<?php echo $RoomType[0][1];?>">
           <input type="number" min="12.0" max="500.0" step="0.5" name="PricePerNight" class="input-box" value="<?php echo $RoomType[0][2];?>">
           <input  type="number" min="10.0" max="500.0" step="0.5"  name="maxOccupancy" class="input-box" value="<?php echo $RoomType[0][3];?>">
           <input type="text" name="amenities" class="input-box" value="<?php echo $RoomType[0][4];?>">
           <input type="text" name="Description" class="input-box" value="<?php echo $RoomType[0][5];?>">
           <input type="submit" name="updateroomtype" class="btn-submit" value="Update RoomType">
        </form>
    </div>
</div>
</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>