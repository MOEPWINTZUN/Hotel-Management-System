<?php
    include("navbar.php");
    require_once("function.php");

    if(isset($_POST["deletehotel"]))
    {
       $hid= $_POST["HotelID"];
       deletehotel($hid);
       header("Location: viewhotel.php");
    }

    $hid = $_GET["HotelID"] ?? $_GET["id"] ?? null;
    $hotel = viewhotel($hid);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Hotel</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body class="hotel">

 <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>

    <div class="form">
        <h2 class="form-title">Delete <?php echo $hotel[0][1]?>Delete Hotel?</h2>
    
    <div class="main">
        <form method="post">
           <input type="hidden" name="HotelID" class="input-box" value="<?php echo $hotel[0][0];?>">
           <input type="text" name="HotelAddress" class="input-box" value="<?php echo $hotel[0][1];?>">
           <input type="text" name="City" class="input-box" value="<?php echo $hotel[0][2];?>">
           <input type="text" name="PostCode" class="input-box" value="<?php echo $hotel[0][3];?>">
           <input type="text" name="Hotel_telNo" class="input-box" value="<?php echo $hotel[0][4];?>">
           <input type="submit" name="deletehotel" value="Delete Hotel" class="btn-submit">
        </form>
    </div>
</div>

</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>