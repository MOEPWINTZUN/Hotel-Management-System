<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View RoomType</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bgc">
    <?php
    include("navbar.php");
    ?>
<div class="hview">
        <h2 class="hviewtitle">Room Types</h2>

        <div class="htablee">
            <table class="htable">
                <thead>
                    <tr>
                        <th>Room Type ID</th>
                        <th>Type Name</th>
                        <th>Price Per Night</th>
                        <th>Max Occupancy</th>
                        <th>Amenities</th>
                        <th>Description</th>
                        <th class="actions-col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $db = new SQLite3('S&MHotel.db');
                        $result = $db->query("SELECT * FROM RoomType");

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            $id   = $row['RoomTypeID'];
                            $name = $row['RoomTypeName'];
                            $price = $row['PricePerNight'];
                            $occ = $row['maxOccupancy'];
                            $amen = $row['amenities'];
                            $desc = $row['Description'];

                            echo "
                            <tr class='hotel-row'>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$price</td>
                                <td>$occ</td>
                                <td>$amen</td>
                                <td>$desc</td>

                                <td class='action-buttons'>
                                    <a class='edit-btn' href='updateroomtype.php?id=$id'>✏️</a>
                                    <a class='delete-btn' href='deleteroomtype.php?id=$id'>🗑️</a>
                                </td>
                            </tr>
                            ";
                        }

                        $db->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
<footer class="footer">
    S&amp;M Hotel © 2025
</footer>
</html>