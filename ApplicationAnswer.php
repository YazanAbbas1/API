<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
mysqli_set_charset($newconnection,"utf8");
if(isset($_POST['Answer']) && isset($_POST['username']) && isset($_POST['start_datum'])&&isset($_POST['slut_datum']))
{
    if($_POST['Answer'] == "approve")
    {
        ApprovingApplication($newconnection,$_POST['username'],$_POST['start_datum'],$_POST['slut_datum'],$_POST['type']);
    }
    else if ($_POST['Answer'] == "deny")
    {
        DenyingApplication($newconnection,$_POST['username'],$_POST['start_datum'],$_POST['slut_datum'],$_POST['type']);
    }
}
function ApprovingApplication($connection,$uname,$startDate,$endDate,$type)
{
    $sql = "INSERT INTO currentactivity (username,type,start_date,end_date) VALUES ('$uname','$type','$startDate','$endDate')";
    $result = mysqli_query($connection,$sql);
    if($result)
       updateValue($connection,$uname);
    else
        echo "failed to insert a new activity";
}
function DenyingApplication($connection,$uname,$startDate,$endDate,$type)
{
    $sql = "DELETE FROM semestertabell where username = '$uname'";
    $result = mysqli_query($connection,$sql);
    if($result)
        echo "Deleted seccessfully";
    else
        echo "failed to delete";
}
function updateValue($connection, $username)
{
    $sql = "UPDATE semestertabell SET value  = '1' where username = '$username'";
    $result = mysqli_query($connection,$sql);
    if($result)
        echo "Updated seccessfully";
    else
        echo "failed to update";

}
?>