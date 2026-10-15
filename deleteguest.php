<?php
    include("navbar.php");
    require_once("function.php");

    if(isset($_POST["deleteguest"]))
    {
       $gid= $_POST["GuestID"];
       deleteguest($gid);
       header("Location: viewguest.php");
    }

    $gid = $_GET["GuestID"] ?? $_GET["id"] ?? null;
    $guest = viewguest($gid);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Guest</title>
    <link rel="stylesheet" herf="style.css"/>
</head>
<body class="hotel">

 <div class="hotel">


    <div class="left">
        <img src="Images/hh2.png" >

        <h2 class="feature-title">Premium Hotel Management</h2>

    
    </div>

    <div class="form">
        <h2 class="form-title">Delete <?php echo $guest[0][1]?>Delete RoomType?</h2>
    
    <div class="main">
        <form method="post">
           <input type="hidden" name="GuestID" class="input-box" value="<?php echo $guest[0][0];?>">
           <input type="text" name="GuestF_Name" class="input-box" value="<?php echo $guest[0][1];?>">
           <input type="text" name="GuestL_Name" class="input-box" value="<?php echo $guest[0][2];?>">
           <input type="text" name="Gender" class="input-box" value="<?php echo $guest[0][3];?>">
           <input type="text" name="DateOfBirth" class="input-box" value="<?php echo $guest[0][4];?>">
           <input type="email" name="Email" class="input-box" value="<?php echo $guest[0][5];?>">
           <input type="text" name="Phnumber" class="input-box" value="<?php echo $guest[0][6];?>">
           <input type="text" name="Address" class="input-box" value="<?php echo $guest[0][7];?>">
           <input type="text" name="Nationality" class="input-box" value="<?php echo $guest[0][8];?>">
           <input type="submit" name="deleteguest" value="Delete Guest" class="btn-submit">
        </form>
    </div>
</div>

</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>