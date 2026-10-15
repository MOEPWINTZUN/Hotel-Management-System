<?php
    include("navbar.php");
    require_once("function.php");
    if (isset($_POST["updatehotel"])) {

    $hid = $_POST["HotelID"];
    $HotelName = $_POST["HotelName"];
    $HotelAddress = $_POST["HotelAddress"];
    $City = $_POST["City"];
    $PostCode = $_POST["PostCode"];
    $Hotel_telNo = $_POST["Hotel_telNo"];

    updatehotel($hid, $HotelName, $HotelAddress, $City, $PostCode, $Hotel_telNo);

    header("Location: viewhotel.php");
    exit();
}

    $hid = $_GET["HotelID"] ?? $_GET["id"] ?? null;
    
    $Hotel = viewhotel($hid);


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
         <h2 class="form-title">Update <?php echo $Hotel[0][1]?>Details?</h2>

        <form method="post">
           <input type="hidden" name="HotelID" class="input-box"  value="<?php echo $Hotel[0][0];?>">
           <input type="text" name="HotelName" class="input-box" value="<?php echo $Hotel[0][1];?>">
           <input type="text" name="HotelAddress" class="input-box" value="<?php echo $Hotel[0][2];?>">
           <input type="text" name="City" class="input-box" value="<?php echo $Hotel[0][3];?>">
           <input type="text" name="PostCode" class="input-box" value="<?php echo $Hotel[0][4];?>">
           <input type="text" name="Hotel_telNo" class="input-box" value="<?php echo $Hotel[0][5];?>">
           <input type="submit" name="updatehotel" class="btn-submit" value="Update Hotel">
        </form>
    </div>
</div>
</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>