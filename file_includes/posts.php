<?php 
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
    
    $posts = $_POST['feeds'];
    $id = $_POST['id'];
    $date  = date("Y-m-d h:i:s");
    $query1 = "SELECT `firstname`,`lastname` FROM `user` WHERE `id` = '$id'";
    $query_run1 = mysql_query($query1);
    $firstname = mysql_result($query_run1 , 0 , 'firstname');
    $lastname = mysql_result($query_run1 , 0 , 'lastname');
    $temp_name = $firstname." ".$lastname;
    if(isset($posts) && isset($id)){
        if(!empty($posts) && !empty($id)){
            $query = "INSERT into `news_feeds` VALUES ('' , '$id' , '$posts','$date','$temp_name')";
            $query_run = mysql_query($query);
            if($query_run){
                echo 'Done';
            }else{
                echo 'Try After Sometime';
            }
        }
    }

?>