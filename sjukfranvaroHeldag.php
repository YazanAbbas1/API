<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);


if(isset($_POST['username']) && isset($_POST['start_date'])){

    $uname = $_POST['username'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date']; 
    $start_time = $_POST['start_time']; 
    $end_date = $_POST['end_date']; 
    $end_time = $_POST['end_time'];
    $meddelande = $_POST['message']; 
    $extern_meddelande = $_POST['extern_message']; 
    $value ='0'; 

    $sql = "select * from sjukanmala where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_set_charset($newconnection,"utf8");
    if(mysqli_num_rows($result) == 0){
        $newsql = "INSERT INTO sjukanmala ( username, quantity, start_date, start_time, end_date, end_time, message, extern_message, value)
         VALUES ( '$uname','$quantity', '$start_date', '$start_time','$end_date', '$end_time','$meddelande', '$extern_meddelande', '$value')";

        $result = mysqli_query($newconnection,$newsql);
        if($result)
            echo "Inserted successfully";
        else
            echo "Failed to insert to sjukanmala tabell";


    }else echo "You already have an ongoing activity"; 

}else echo "You need to choose an available start date";