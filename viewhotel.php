<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Jobs</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bgc">
    <?php
    include("navbar.php");
    ?>
    <div class="hview">
    <h2 class="hviewtitle">Hotel List</h2>

    <div class="htablee">
        <table class="htable">
            <thead>
                <tr>
                    <th>Hotel ID</th>
                    <th>Hotel Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postcode</th>
                    <th>Telephone</th>
                    <th class="actions-col">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $db = new SQLite3('S&MHotel.db');
                $select_query = "SELECT * FROM Hotel";
                $result = $db->query($select_query);

                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    $hid = $row['HotelID'];
                    $hname = $row['HotelName'];
                    $hadd = $row['HotelAddress'];
                    $city = $row['City'];
                    $pcode = $row['PostCode'];
                    $htelno = $row['Hotel_telNo'];

                    echo "
                    <tr class='hotel-row'>
                        <td>$hid</td>
                        <td>$hname</td>
                        <td>$hadd</td>
                        <td>$city</td>
                        <td>$pcode</td>
                        <td>$htelno</td>
                        <td class='action-buttons'>
                            <a class='edit-btn' href='updatehotel.php?id=$hid'>
                                ✏️
                            </a>
                            <a class='delete-btn' href='deletehotel.php?id=$hid'>
                                🗑️
                            </a>
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