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
        $sql = "select * from securityquestions where username = '". $uname ."'";
        $result = mysqli_query($newconnection,$sql);
        
            $row = mysqli_fetch_assoc($result);
            $arr = array();
            $arr['first_question'] = $row['first_question'];
            $arr['second_question']=$row['second_question'];
            $arr['third_question']= $row['third_question'];
            
            if (mysqli_num_rows($result) != 0)
            {
                if(questioncheck($arr,$q1) && questioncheck($arr,$q2) && questioncheck($arr,$q3))
                    echo "Verified";
                else
                    echo "failed";
            }
            else echo "failed fetching the data";
        
     }
     else echo "All fields are requiered";

    function questioncheck($dbAnswers,$userAnswer)
    {
        $dbA1 = $dbAnswers['first_question'];
        $dbA2 = $dbAnswers['second_question'];
        $dbA3 =$dbAnswers['third_question'];
        if($userAnswer==$dbA1 || $userAnswer== $dbA2|| $userAnswer==$dbA3)
            return true;
        else 
            return false;
    }
?>