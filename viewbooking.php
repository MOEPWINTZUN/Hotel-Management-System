<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bgc">
    <?php
        include("navbar.php");
    ?>
    <div class="hview">
        <h2 class="hviewtitle">Booking Records</h2>

        <div class="htablee">
            <table class="htable">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Guest Name</th>
                        <th>Room ID</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Booking Date</th>
                        <th>No. of Guests</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Special Requests</th>
                        <th class="actions-col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $db = new SQLite3('S&MHotel.db');

                        $select_query = "
                            SELECT 
                                b.BookingID,
                                g.GuestF_Name || ' ' || g.GuestL_Name AS GuestName,
                                r.RoomID,
                                b.CheckInDate,
                                b.CheckOutDate,
                                b.BookingDate,
                                b.NumberOfGuest,
                                b.TotalAmount,
                                b.BookingStatus,
                                b.PaymentMethod,
                                b.SpecialRequests
                            FROM Booking b
                            INNER JOIN Guest g ON b.GuestID = g.GuestID
                            INNER JOIN Room r ON b.RoomID = r.RoomID
                            ORDER BY g.GuestF_Name;
                        ";

                        $result = $db->query($select_query);

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

                            $bid = $row['BookingID'];
                            $guestname = $row['GuestName'];
                            $roomid = $row['RoomID'];
                            $cindate = $row['CheckInDate'];
                            $coutdate = $row['CheckOutDate'];
                            $bookdate = $row['BookingDate'];
                            $num = $row['NumberOfGuest'];
                            $amt = $row['TotalAmount'];
                            $status = $row['BookingStatus'];
                            $pay = $row['PaymentMethod'];
                            $req = $row['SpecialRequests'];

                            echo "
                            <tr class='hotel-row'>
                                <td>$bid</td>
                                <td>$guestname</td>
                                <td>$roomid</td>
                                <td>$cindate</td>
                                <td>$coutdate</td>
                                <td>$bookdate</td>
                                <td>$num</td>
                                <td>$amt</td>
                                <td>$status</td>
                                <td>$pay</td>
                                <td>$req</td>

                                <td class='action-buttons'>
                                    <a class='edit-btn' href='updatebooking.php?id=$bid'>✏️</a>
                                    <a class='delete-btn' href='deletebooking.php?id=$bid'>🗑️</a>
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