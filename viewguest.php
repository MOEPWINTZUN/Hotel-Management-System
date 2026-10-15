<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Guest</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body class="bgc">
    <?php
    include("navbar.php");
    ?>
 <div class="hview">
        <h2 class="hviewtitle">Guest List</h2>

        <div class="htablee">
            <table class="htable">
                <thead>
                    <tr>
                        <th>Guest ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Nationality</th>
                        <th class="actions-col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $db = new SQLite3('S&MHotel.db');
                        $query = "SELECT * FROM Guest";
                        $result = $db->query($query);

                        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                            $gid  = $row['GuestID'];
                            $fn   = $row['GuestF_Name'];
                            $ln   = $row['GuestL_Name'];
                            $sex  = $row['Gender'];
                            $dob  = $row['DateOfBirth'];
                            $mail = $row['Email'];
                            $ph   = $row['Phnumber'];
                            $addr = $row['Address'];
                            $nat  = $row['Nationality'];

                            echo "
                            <tr class='hotel-row'>
                                <td>$gid</td>
                                <td>$fn</td>
                                <td>$ln</td>
                                <td>$sex</td>
                                <td>$dob</td>
                                <td>$mail</td>
                                <td>$ph</td>
                                <td>$addr</td>
                                <td>$nat</td>

                                <td class='action-buttons'>
                                    <a class='edit-btn' href='updateguest.php?id=$gid'>✏️</a>
                                    <a class='delete-btn' href='deleteguest.php?id=$gid'>🗑️</a>
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