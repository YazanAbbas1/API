<?php
require "dbConfig.php";
$db = new dbConfig();
$newconnection=mysqli_connect($db->host,$db->username,$db->password,$db->databasename);

if (isset($_POST['avsluta']) && $_POST['avsluta'] == 'avsluta') {
    if (isset($_POST['username'])) {
        $uname = $_POST['username'];
        $sql = "Delete from vabbtabell where username = '" . $uname . "'";
        $result = mysqli_query($newconnection,$sql);
        if ($result) {
            echo "DO UR THING";
        }
        else {
            echo "FUCK OFF";
        }
    }
    else {
        echo "WRONG YA BOURI";
    }
}
?>
