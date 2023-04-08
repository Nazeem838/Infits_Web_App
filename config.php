<?php
// define('DB_SERVER', 'www.db4free.net');
// define('DB_USERNAME', 'infits_free_test');
// define('DB_PASSWORD', 'EH6.mqRb9QBdY.U');
// define('DB_NAME', 'infits_db');
// Try connecting to the Database
$conn = new mysqli("www.db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");
//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}

?>
