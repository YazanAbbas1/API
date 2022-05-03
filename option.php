<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);

if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $sql = "select * from vabbtabell where username = '" . $uname . "'";
    $result = mysqli_query($newconnection,$sql);
    if (mysqli_num_rows($result) == 0) {
        echo "DO UR THING";
    }
    else {
        echo "FUCK OFF";
    }
}
else {
    echo "WRONG YA BOURI";
}
?>