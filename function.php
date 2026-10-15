<?php
require_once("dbconnect.php");

function addhotel($hname, $haddress, $city, $pcode, $telNo)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO Hotel (HotelName, HotelAddress, City, PostCode, Hotel_telNo) VALUES (:hname, :haddress, :city, :pcode, :telNo)");
    $stmt->bindValue(':hname', $hname, SQLITE3_TEXT);
    $stmt->bindValue(':haddress', $haddress, SQLITE3_TEXT);
    $stmt->bindValue(':city', $city, SQLITE3_TEXT);
    $stmt->bindValue(':pcode', $pcode, SQLITE3_TEXT);
    $stmt->bindValue(':telNo', $telNo, SQLITE3_TEXT);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "A new Hotel  created successfully!";
    } else {
        echo "Failed to create Hotel.";
    }
    $db->close();
}


function addRoomType($rname, $price, $maxo, $amenities, $des)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO RoomType (RoomTypeName, PricePerNight, maxOccupancy, amenities, Description)
                                    VALUES (:rname, :price, :maxo, :amenities, :des)");
    $stmt->bindValue(':rname', $rname, SQLITE3_TEXT);
    $stmt->bindValue(':price', $price, SQLITE3_FLOAT);
    $stmt->bindValue(':maxo', $maxo, SQLITE3_INTEGER);
    $stmt->bindValue(':amenities', $amenities, SQLITE3_TEXT);
    $stmt->bindValue(':des', $des, SQLITE3_TEXT);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "A new RoomType  created successfully!";
    } else {
        echo "Failed to create Room Type record.";
    }
    $db->close();
}

function addguest($fname, $lname, $gender, $dob, $mail, $phnum, $add, $naiton)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO Guest  (GuestF_Name , GuestL_Name, Gender, DateOfBirth, Email, Phnumber, Address, Nationality)
                                    VALUES (:fname, :lname, :gender, :dob, :email, :phnum, :add, :naiton)");
    $stmt->bindValue(':fname', $fname, SQLITE3_TEXT);
    $stmt->bindValue(':lname', $lname, SQLITE3_TEXT);
    $stmt->bindValue(':gender', $gender, SQLITE3_TEXT);
    $stmt->bindValue(':dob', $dob, SQLITE3_TEXT);
    $stmt->bindValue(':email', $mail, SQLITE3_TEXT);
    $stmt->bindValue(':phnum', $phnum, SQLITE3_TEXT);
    $stmt->bindValue(':add', $add, SQLITE3_TEXT);
    $stmt->bindValue(':naiton', $naiton, SQLITE3_TEXT);
    
    
    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "A new Guest  created successfully!";
        
    } else {
        echo "Failed to create Guest record.";
    }
    $db->close();
}

function dropdownhotel()
{
    $db = dbconnect();
    $query = "SELECT HotelID, HotelName FROM Hotel";
    $result = $db->query($query);

    // Start the dropdown <select> element
    echo '<select name="HotelName">';
    echo '<option value="">Hotel Name</option>'; // Placeholder option

    // Loop through each row and create an <option> element
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['HotelID'] . '">' . $row['HotelName'] . '</option>';
    }
    // End the <select> element
    echo '</select>';
    $db->close();
}

function dropdownroomtype()
{
    $db = dbconnect();
    $query = "SELECT RoomTypeID, RoomTypeName FROM RoomType";
    $result = $db->query($query);

    // Start the dropdown <select> element
    echo '<select name="RoomTypeName">';
    echo '<option value="">RoomType Name</option>'; // Placeholder option

    // Loop through each row and create an <option> element
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['RoomTypeID'] . '">' . $row['RoomTypeName'] . '</option>';
    }
    // End the <select> element
    echo '</select>';
    $db->close();
}

function addroom($hid, $rtid, $rnum, $rstatus, $flnum, $mark)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO Room  (HotelID, RoomTypeID, RoomNumber, RoomStatus, FloorNumber, Remarks)
                                    VALUES (:hid, :rtid, :rnum, :rstatus, :flnum, :mark)");
    $stmt->bindValue(':hid', $hid, SQLITE3_INTEGER);
    $stmt->bindValue(':rtid', $rtid, SQLITE3_TEXT);
    $stmt->bindValue(':rnum', $rnum, SQLITE3_TEXT);
    $stmt->bindValue(':rstatus', $rstatus, SQLITE3_TEXT);
    $stmt->bindValue(':flnum', $flnum, SQLITE3_TEXT);
    $stmt->bindValue(':mark', $mark, SQLITE3_TEXT);
    
    
    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "A new Room  created successfully!";
        
    } else {
        echo "Failed to create Room record.";
    }
    $db->close();
}

function dropdownroom()
{
    $db = dbconnect();
    $query = "SELECT RoomID, RoomNumber FROM Room";
    $result = $db->query($query);

    // Start the dropdown <select> element
    echo '<select name="RoomNumber">';
    echo '<option value="">Room Number</option>'; // Placeholder option

    // Loop through each row and create an <option> element
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['RoomID'] . '">' . $row['RoomNumber'] . '</option>';
    }
    // End the <select> element
    echo '</select>';
    $db->close();
}

function dropdownguest()
{
    $db = dbconnect();
    $query = "SELECT GuestID, GuestF_Name FROM Guest";
    $result = $db->query($query);

    echo '<select name="GuestF_Name">';
    echo '<option value="">Guest Name</option>'; 

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo '<option value="' . $row['GuestID'] . '">' . $row['GuestF_Name'] . '</option>';
    }

    echo '</select>';
    $db->close();
}

function addbooking($guid, $roomid, $cindate, $coutdate, $bdate, $numofg, $total, $bstatus, $pay, $srequest)
{
    $db = dbconnect();
    $stmt = $db->prepare("INSERT INTO Booking(GuestID, RoomID, CheckInDate, CheckOutDate, BookingDate, NumberOfGuest, TotalAmount, BookingStatus, PaymentMethod, SpecialRequests)
                                    VALUES (:guid, :roomid, :cindate, :coutdate, :bdate, :numofg, :total, :bstatus, :pay, :srequest)");
    $stmt->bindValue(':guid', $guid, SQLITE3_INTEGER);
    $stmt->bindValue(':roomid', $roomid, SQLITE3_INTEGER);
    $stmt->bindValue(':cindate', $cindate, SQLITE3_TEXT);
    $stmt->bindValue(':coutdate', $coutdate, SQLITE3_TEXT);
    $stmt->bindValue(':bdate', $bdate, SQLITE3_TEXT);
    $stmt->bindValue(':numofg', $numofg, SQLITE3_INTEGER);
    $stmt->bindValue(':total', $total, SQLITE3_FLOAT);
    $stmt->bindValue(':bstatus', $bstatus, SQLITE3_TEXT);
    $stmt->bindValue(':pay', $pay, SQLITE3_TEXT);
    $stmt->bindValue(':srequest', $srequest, SQLITE3_TEXT);
    
    
    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "A new Booking created successfully!";
        
    } else {
        echo "Failed to create Booking record.";
    }
    $db->close();
}

function viewhotel($HotelID){
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM Hotel WHERE HotelID = :hotelid");
    $stmt->bindValue(":hotelid", $HotelID, SQLITE3_INTEGER);
    
    $result = $stmt->execute();
    $hotel_detail = [];

    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        $hotel_detail[] = $row;
    }

    $db->close();
    return $hotel_detail;
}


function updatehotel($hid, $hoteln, $hoteladd, $ci, $postco, $hoteltelno){
    $db= dbconnect();
    $stmt = $db->prepare("UPDATE Hotel SET HotelName =:hoteln, HotelAddress=:hoteladd,
     City =:ci,  PostCode  =:postco,  Hotel_telNo =:hoteltelno
     WHERE HotelID = :hotelid");
    $stmt->bindValue(":hotelid", $hid, SQLITE3_INTEGER);
    $stmt->bindValue(":hoteln", $hoteln, SQLITE3_TEXT);
    $stmt->bindValue(":hoteladd", $hoteladd, SQLITE3_TEXT);
    $stmt->bindValue(":ci", $ci, SQLITE3_TEXT);
    $stmt->bindValue(":postco", $postco, SQLITE3_TEXT);
    $stmt->bindValue(":hoteltelno", $hoteltelno, SQLITE3_TEXT);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Successfully Update the Record!";
    } else {
        echo "Error in updating the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function deletehotel($hid)
{
    $db= dbconnect();
    $stmt = $db->prepare("DELETE FROM Hotel WHERE HotelID = :hotelid");
    $stmt->bindValue(":hotelid", $hid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Successfully deleting the Record!";
    } else {
        echo "Error in deleting the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function viewroomtype($RoomTypeID){
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM RoomType WHERE RoomTypeID = :rtid");
    $stmt->bindValue(":rtid", $RoomTypeID, SQLITE3_INTEGER);
    
    $result = $stmt->execute();
    $Rtype_detail = [];

    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        $Rtype_detail[] = $row;
    }

    $db->close();
    return $Rtype_detail;
}


function updateroomtype($rtid, $rtname, $pricepern, $maxoc, $amen, $des){
    $db= dbconnect();
    $stmt = $db->prepare("UPDATE RoomType SET RoomTypeName =:rtname, PricePerNight=:pricepern,
     maxOccupancy =:maxoc,  amenities  =:amen,  Description =:des
     WHERE RoomTypeID = :rtid");
    $stmt->bindValue(":rtid", $rtid, SQLITE3_INTEGER);
    $stmt->bindValue(":rtname", $rtname, SQLITE3_TEXT);
    $stmt->bindValue(":pricepern", $pricepern, SQLITE3_FLOAT);
    $stmt->bindValue(":maxoc", $maxoc, SQLITE3_INTEGER);
    $stmt->bindValue(":amen", $amen, SQLITE3_TEXT);
    $stmt->bindValue(":des", $des, SQLITE3_TEXT);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Successfully Update the Record!";
    } else {
        echo "Error in updating the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function deleteroomtype($rtid)
{
    $db= dbconnect();
    $stmt = $db->prepare("DELETE FROM RoomType WHERE RoomTypeID = :rtid");
    $stmt->bindValue(":rtid", $rtid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Successfully deleting the Record!";
    } else {
        echo "Error in deleting the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function viewguest($GuestID){
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM Guest WHERE GuestID = :gid");
    $stmt->bindValue(":gid", $GuestID, SQLITE3_INTEGER);
    
    $result = $stmt->execute();
    $guest_detail = [];

    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        $guest_detail[] = $row;
    }

    $db->close();
    return $guest_detail;
}


function updateguest($gid, $fn, $ln, $sex, $dob, $mail,$ph, $addr, $nat){
    $db= dbconnect();
    $stmt = $db->prepare("UPDATE Guest SET GuestF_Name =:fn, 
    GuestL_Name=:ln, Gender =:sex,  DateOfBirth  =:dob,  
    Email =:mail, Phnumber =:ph, Address =:addr, Nationality =:nat
     WHERE GuestID = :gid");
    $stmt->bindValue(":gid", $gid, SQLITE3_INTEGER);
    $stmt->bindValue(":fn", $fn, SQLITE3_TEXT);
    $stmt->bindValue(":ln", $ln, SQLITE3_TEXT);
    $stmt->bindValue(":sex", $sex, SQLITE3_TEXT);
    $stmt->bindValue(":dob", $dob, SQLITE3_TEXT);
    $stmt->bindValue(":mail", $mail, SQLITE3_TEXT);
    $stmt->bindValue(":ph", $ph, SQLITE3_TEXT);
    $stmt->bindValue(":addr", $addr, SQLITE3_TEXT);
    $stmt->bindValue(":nat", $nat, SQLITE3_TEXT);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "Successfully Update the Record!";
    } else {
        echo "Error in updating the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function deleteguest($gid)
{
    $db= dbconnect();
    $stmt = $db->prepare("DELETE FROM Guest WHERE GuestID = :gid");
    $stmt->bindValue(":gid", $gid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Successfully deleting the Record!";
    } else {
        echo "Error in deleting the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function viewroom($RoomID){
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM Room WHERE RoomID = :rid");
    $stmt->bindValue(":rid", $RoomID, SQLITE3_INTEGER);
    
    $result = $stmt->execute();
    $room_detail = [];

    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        $room_detail[] = $row;
    }

    $db->close();
    return $room_detail;
}


function updateroom($rid, $hotel_id, $roomtype_id, $rnum, $status, $floor, $remarks){ 
    $db = dbconnect();

    $stmt = $db->prepare("
        UPDATE Room SET 
            HotelID = :hotel_id,
            RoomTypeID = :roomtype_id,
            RoomNumber = :rnum,
            RoomStatus = :status,
            FloorNumber = :floor,
            Remarks = :remarks
        WHERE RoomID = :rid
    ");

    $stmt->bindValue(":rid", $rid, SQLITE3_INTEGER);
    $stmt->bindValue(":hotel_id", $hotel_id, SQLITE3_INTEGER);
    $stmt->bindValue(":roomtype_id", $roomtype_id, SQLITE3_INTEGER);
    $stmt->bindValue(":rnum", $rnum, SQLITE3_INTEGER);
    $stmt->bindValue(":status", $status, SQLITE3_TEXT);
    $stmt->bindValue(":floor", $floor, SQLITE3_INTEGER);
    $stmt->bindValue(":remarks", $remarks, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "Successfully updated room record!";
    } else {
        echo "Error updating room: " . $db->lastErrorMsg();
    }

    $db->close();
}

function deleteroom($rid)
{
    $db= dbconnect();
    $stmt = $db->prepare("DELETE FROM Room WHERE RoomID = :rid");
    $stmt->bindValue(":rid", $rid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Successfully deleting the Record!";
    } else {
        echo "Error in deleting the record." . $db->lastErrorMsg();
    }
    $db->close();
}

function viewbooking($BookingID){
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM Booking WHERE BookingID = :bid");
    $stmt->bindValue(":bid", $BookingID, SQLITE3_INTEGER);
    
    $result = $stmt->execute();
    $bookig_detail = [];

    while ($row = $result->fetchArray(SQLITE3_NUM)) {
        $bookig_detail[] = $row;
    }

    $db->close();
    return $bookig_detail;
}


function updatebooking($bid, $GuestID, $room_id, $cindate, $coutdate, $bookdate, $num, $amt, $status, $pay, $req){ 
    $db = dbconnect();

    $stmt = $db->prepare("
        UPDATE Booking SET 
            GuestID = :GuestID,
            RoomID = :room_id,
            CheckInDate = :cindate,
            CheckOutDate = :coutdate,
            BookingDate = :bookdate,
            NumberOfGuest = :num,
            TotalAmount = :amt,
            BookingStatus = :status,
            PaymentMethod = :pay,
            SpecialRequests = :req
        WHERE BookingID = :bid
    ");

    $stmt->bindValue(":bid", $bid, SQLITE3_INTEGER);
    $stmt->bindValue(":GuestID", $GuestID, SQLITE3_INTEGER);
    $stmt->bindValue(":room_id", $room_id, SQLITE3_INTEGER);
    $stmt->bindValue(":cindate", $cindate, SQLITE3_TEXT);
    $stmt->bindValue(":coutdate", $coutdate, SQLITE3_TEXT);
    $stmt->bindValue(":bookdate", $bookdate, SQLITE3_TEXT);
    $stmt->bindValue(":num", $num, SQLITE3_INTEGER);
    $stmt->bindValue(":amt", $amt, SQLITE3_FLOAT);
    $stmt->bindValue(":status", $status, SQLITE3_TEXT);
    $stmt->bindValue(":pay", $pay, SQLITE3_TEXT);
    $stmt->bindValue(":req", $req, SQLITE3_TEXT);


    if ($stmt->execute()) {
        echo "Successfully updated Booking record!";
    } else {
        echo "Error updating Booking: " . $db->lastErrorMsg();
    }

    $db->close();
}

function deletebooking($bid)
{
    $db= dbconnect();
    $stmt = $db->prepare("DELETE FROM Booking WHERE BookingID = :bid");
    $stmt->bindValue(":bid", $bid, SQLITE3_INTEGER);

    if ($stmt->execute()) {
        echo "Successfully deleting the Record!";
    } else {
        echo "Error in deleting the record." . $db->lastErrorMsg();
    }
    $db->close();
} 
// ---------- Function 1: Print All Tables ----------
/*function printAllTables($db)
{
    $query = "SELECT name FROM sqlite_master WHERE type='table'";
    $results = $db->query($query);

    echo "-----------------------<br>";
    echo "Tables in the database:<br>";
    echo "-----------------------<br>";

    if ($results) {
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            echo $row['name'] . "<br>";
        }
    } else {
        echo "No tables found.<br>";
    }

    echo "-----------------------<br>";
}
*/

/*



function updateEmail($db)
{
    $sql = "UPDATE Guest SET Email='newemail@test.com' WHERE GuestID = 1;";

    if ($db->exec($sql)) {
        echo "Email updated successfully.<br>";
    } else {
        echo "Error updating email.<br>";
    }
}



function deleteGuest($db)
{
    $sql = "DELETE FROM Guest WHERE GuestID = 20;";

    if ($db->exec($sql)) {
        echo "Guest deleted successfully.<br>";
    } else {
        echo "Error deleting guest.<br>";
    }
}*/



/*function printAllGuests($db)
{
    $sql = "SELECT * FROM Guest";
    $result = $db->query($sql);

    echo "Guest in S&M Hotel <br>";
    echo "-----------------------------------------<br>";

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo $row['GuestID'] . " " .
             $row['GuestF_Name'] . " " .
             $row['GuestL_Name'] . " " .
             $row['Gender'] . " " .
             $row['DateOfBirth'] . " " .
             $row['Email'] . " " .
             $row['Phnumber'] . " " .
             $row['Address'] . " " .
             $row['Nationality'] . "<br>";
    }

    echo "-----------------------------------------<br>";
}*/

?>
