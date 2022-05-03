<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
mysqli_set_charset($newconnection,"utf8");
if(isset($_POST['GetNotis']) && $_POST['GetNotis']!=null && $_POST['GetNotis']== "notis")
{
    $sql = "SELECT * from semestertabell where value = '0'";
    $result = mysqli_query($newconnection,$sql);
    $jsonArr = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $arr = array();
        if(mysqli_num_rows($result)!=0 )
        {
            $arr['start_date']= $row['start_date'];
            $arr['end_date']= $row['end_date'];
            $arr['username']= $row['username'];
            $arr['msg']=$row ['msg'];
            $arr['type']= 'semester:';
        }
        array_push($jsonArr,$arr);
    }
    $sql = "SELECT * from flex where value = '0'";
    $result = mysqli_query($newconnection,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $arr = array();
        if(mysqli_num_rows($result)!=0 )
        {
            $arr['start_date']= $row['start_date'];
            $arr['end_date']= $row['end_date'];
            $arr['start_time']= $row['start_time'];
            $arr['end_time']= $row['end_time'];
            $arr['username']= $row['username'];
            $arr['msg']=$row ['msg'];
            $arr['Emsg']=$row ['Emsg'];
            $arr['type']= 'Flex:';
        }
        array_push($jsonArr,$arr);
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($jsonArr);
}else if(isset($_POST['GetCount']) && $_POST['GetCount']!=null && $_POST['GetCount']=="count"){
    getCount();
}else echo "All fields are requiered";


function getCount()
{
    $db = new dbConfig();
    $newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);
    $counter = 0;
    $sql = "SELECT * from semestertabell where value = '0'";
    $result = mysqli_query($newconnection,$sql);
    
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['value']== "0" && $_POST['username'] != $row['username'])
        {
            $counter++;
        }
    }
    $sql = "SELECT * from flex where value = '0'";
    $result = mysqli_query($newconnection,$sql);
    
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['value']== "0" && $_POST['username'] != $row['username'])
        {
            $counter++;
        }
    }
    $count = strval($counter);
    echo $count;
}
?>