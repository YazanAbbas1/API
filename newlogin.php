<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);



if (isset($_POST['username']) && isset($_POST['password']) && $_POST['password'] != "" && $_POST['username'] != "")
{
    $uname = $_POST['username'];
    $pword = $_POST['password'];    
    
    $sql = "select * from employee where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) != 0)
    {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        isValid($uname, $dbusername,$pword,$dbpassword,$row['role']);
    }       
    else echo "Login failed!";
}else echo "All fields are required";
function getRole($Role)
{
    if($Role=="1")
        echo "supervisor";
    
    else if($Role=="0")
        echo"employee";
    else
        echo "failed to determin the role";
}

function isValid($username, $uname, $password, $pass,$role)
{
    if($pass==$password && $uname!=$username)
        echo "Wrong username";
    else if(($pass!=$password) && $uname==$username)
    echo "Wrong password";
    else if (($pass!=$password)&& ($uname!=$username))
        echo"Wrong credentials";
    else
        {
            getRole($role);
        }
}
?>