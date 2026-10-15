<?php

// ---------- Database Connection ----------
function dbconnect(){
    return $db = new SQLite3("S&MHotel.db");
}

?>