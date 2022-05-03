<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);

if(isset($_POST['username'])&& isset($_POST['meddelande'])){

    $uname = $_POST['username'];
    $message = $_POST['meddelande'];
    $value ='0'; 

    $sql = "select * from distanstabell where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 0){
        $sql = "INSERT INTO distanstabell ( username, meddelande, value) VALUES ( '$uname', '$message', '$value')";

        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Inserted successfully";
        else
            echo "Failed to insert to distanstabell";

    }else echo "You already have an ongoing activity"; 

}else "waoooooooo";