<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
<<<<<<< HEAD
mysqli_set_charset($newconnection,"utf8");
=======

>>>>>>> 7a4b844acaac835a30eaa166af64693a5d411741
if(isset($_POST['username']) && isset($_POST['start_date'])){

    $uname = $_POST['username'];
    $quantity = $_POST['quantity'];
    $start_date = $_POST['start_date']; 
    $end_date = $_POST['end_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
<<<<<<< HEAD
    $Emsg = $_POST['Emsg'];
=======
>>>>>>> 7a4b844acaac835a30eaa166af64693a5d411741
    $msg = $_POST['msg']; 

    $value ='0'; 

<<<<<<< HEAD
    $sql = "select * from flex where username = '" . $uname . "'";
=======
    $sql = "select * from flextabell where username = '" . $uname . "'";
>>>>>>> 7a4b844acaac835a30eaa166af64693a5d411741
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0){
<<<<<<< HEAD
        $sql = "INSERT INTO flex ( username, quantity, start_date, end_date, start_time, end_time, msg,Emsg, value) VALUES ( '$uname','$quantity', '$start_date',  '$end_date', '$start_time', '$end_time', '$msg','$Emsg','$value')";
=======
        $sql = "INSERT INTO flextabell ( username, quantity, start_date, end_date, start_time, end_time, msg, value) VALUES ( '$uname','$quantity', '$start_date',  '$end_date', '$start_time', '$end_time', '$value')";
>>>>>>> 7a4b844acaac835a30eaa166af64693a5d411741

        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Inserted successfully";
        else
            echo "Failed to insert to flextabell";


    }else echo "You already have an ongoing activity"; 

<<<<<<< HEAD
}else echo "You need to choose an available start date and Start Time";
?>
=======
}else echo "You need to choose an available start date and Start Time";
>>>>>>> 7a4b844acaac835a30eaa166af64693a5d411741
