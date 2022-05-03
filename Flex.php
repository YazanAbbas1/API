<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
mysqli_set_charset($newconnection,"utf8");
if(isset($_POST['username']) && isset($_POST['start_date'])){

    $uname = $_POST['username'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date']; 
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $Emsg = $_POST['Emsg'];
    $msg = $_POST['msg']; 

    $value ='0'; 

    $sql = "select * from flex where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO flex ( username, quantity, start_date, end_date, start_time, end_time, msg,Emsg, value) VALUES ( '$uname','$quantity', '$start_date',  '$end_date', '$start_time', '$end_time', '$msg','$Emsg','$value')";

        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Inserted successfully";
        else
            echo "Failed to insert to flextabell";


    }else echo "You already have an ongoing activity"; 

}else echo "You need to choose an available start date and Start Time";
?>