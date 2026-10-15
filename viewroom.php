<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Room</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bgc">
    <?php
        include("navbar.php");
    ?>
    <div class="hview">
        <h2 class="hviewtitle">Room List</h2>

        <div class="htablee">
            <table class="htable">
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Hotel Name</th>
                        <th>Room Type</th>
                        <th>Room Number</th>
                        <th>Status</th>
                        <th>Floor</th>
                        <th>Remarks</th>
                        <th class="actions-col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $db = new SQLite3('S&MHotel.db');
                        $select_query = "
                            SELECT r.RoomID, h.HotelName, rt.RoomTypeName, 
                                   r.RoomNumber, r.RoomStatus, 
                                   r.FloorNumber, r.Remarks
                            FROM Room r
                            INNER JOIN Hotel h ON r.HotelID = h.HotelID
                            INNER JOIN RoomType rt ON r.RoomTypeID = rt.RoomTypeID
                        ";
                        $result = $db->query($select_query);

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            $rid = $row['RoomID'];
                            $hname = $row['HotelName'];
                            $rtype = $row['RoomTypeName'];
                            $rnum  = $row['RoomNumber'];
                            $status = $row['RoomStatus'];
                            $floor = $row['FloorNumber'];
                            $remarks = $row['Remarks'];

                            echo "
                            <tr class='hotel-row'>
                                <td>$rid</td>
                                <td>$hname</td>
                                <td>$rtype</td>
                                <td>$rnum</td>
                                <td>$status</td>
                                <td>$floor</td>
                                <td>$remarks</td>
                                <td class='action-buttons'>
                                    <a class='edit-btn' href='updateroom.php?id=$rid'>✏️</a>
                                    <a class='delete-btn' href='deleteroom.php?id=$rid'>🗑️</a>
                                </td>
                            </tr>";
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