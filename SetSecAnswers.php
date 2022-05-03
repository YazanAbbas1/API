<?php
 require "dbConfig.php";
 $db = new dbConfig();
 $newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
 mysqli_set_charset($newconnection,"utf8");
 if(isset($_POST['first_question']) && isset($_POST['second_question']) && isset($_POST['third_question']))
 {  $uname = $_POST['username'];
    $q1 = $_POST['first_question'];
    $q2 = $_POST['second_question'];
    $q3 = $_POST['third_question'];
    $sql = "INSERT INTO securityquestions (username, first_question, second_question, third_question) VALUES ('$uname','$q1','$q2','$q3')";
    $result = mysqli_query($newconnection,$sql);
            if($result)
                echo "Inserted successfully";
            else
                echo "failed to insert a new employee";
 }
?>