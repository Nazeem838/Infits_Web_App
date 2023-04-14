<?php 

# server name
$sName = "db4free.net";
# user name
$uName = "infits_free_test";
# password
$pass = "EH6.mqRb9QBdY.U";

# database name
$db_name = "infits_db";
$conn1 = mysqli_connect($sName, $uName, $pass, $db_name);

#creating database connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}