<?php
    require "dbConfig.php";
    $db = new dbConfig();
    $newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
    if($_POST['register'])
        {
            mysqli_set_charset($newconnection,"utf8");
            $uname = $_POST['username'];
            $pword = $_POST['password'];
            $fname = $_POST['firstname'];
            $lname = $_POST['secondname'];
            $phoneumber = $_POST['phonenumber'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            $supervisorID = $_POST['supervisor'];
            $role = $_POST['role'];
            $sql = "INSERT INTO employee (id, username,email,firstname, secondname, phonenumber, password, supervisor, role) VALUES ('$id', '$uname', '$email', '$fname', '$lname', '$phoneumber', '$pword', '$supervisorID', '$role')";
            $result = mysqli_query($newconnection,$sql);
            if($result)
                echo "Inserted seccessfully";
            else
                echo "failed to insert a new employee";
        }
    ?>