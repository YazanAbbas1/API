<?php
    require "dbConfig.php";
    $db = new dbConfig();
    $newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
    if(isset($_POST['username']))
    {
        $uname = $_POST['username'];
        $newPassword = $_POST['password'];
        
        $sql = "UPDATE employee SET password= '".$newPassword."' where username = '" . $uname . "'";
        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Password updated";
        else
            echo "failed updating the Password";
    }
?>