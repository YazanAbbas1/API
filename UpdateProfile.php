<?php
    require "dbConfig.php";
    $db = new dbConfig();
    $newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
    if(isset($_POST['username']))
    {
        $uname = $_POST['username'];
        $firstname = $_POST['firstname'];
        $secondname = $_POST['secondname'];
        $sql = "UPDATE employee SET firstname= '".$firstname."',secondname = '".$secondname."' where username = '" . $uname . "'";
        $result = mysqli_query($newconnection,$sql);
        if($result)
            echo "Data updated";
        else
            echo "failed updating the data";
    }
?>