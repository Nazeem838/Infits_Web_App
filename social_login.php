<?php

    session_start();

    $_SESSION["id"] = $_POST["id"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];

    $mysqli = new mysqli("db4free.net", "infits_free_test", "EH6.mqRb9QBdY.U", "infits_db");

    $query = "SELECT * FROM dietitian WHERE email='".$_POST["email"]."'";
    $data = $mysqli->query($sql);

    if(!empty($data->fetch_assoc())){
        $query1 = "UPDATE dietitian SET social_id='".$_POST["id"]."' WHERE email='".$_POST["email"]."'";
    }else{
        echo "Sign Up";
    }

    $mysqli->query($query1);

    echo "Successful authenticated";
?>