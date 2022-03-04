<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
if(isset($_POST['username']))
{
    $username = $_POST['username'];
    $sql = "select * from securityquestions where username = '$username'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)!=0)
        echo "Exists";
    else
        echo "Not Found";
    

}
?>