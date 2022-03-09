<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);

if(isset($_POST['username']) && isset($_POST['start_date'])){

    $uname = $_POST['username'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date']; 
    $end_date = $_POST['end_date']; 
    $value ='0'; 

    $sql = "select * from semestertabell where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO semestertabell ( username, quantity, start_date, end_date, value) VALUES ( '$uname','$quantity', '$start_date',  '$end_date', '$value')";

        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Inserted successfully";
        else
            echo "Failed to insert to semestertabell";


    }else echo "You already have an ongoing activity"; 

}else echo "You need to choose an available start date";