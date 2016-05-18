<?php 
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
    
    $posts = $_POST['feeds'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $date  = date("Y-m-d h:i:s");
    if(isset($posts) && isset($id)){
        if(!empty($posts) && !empty($id)){
            $query = "INSERT into `news_feeds` VALUES ('' , '$id' , '$posts','$date','$name')";
            $query_run = mysql_query($query);
            if($query_run){
                echo 'Done';
            }else{
                echo 'Try After Sometime';
            }
        }
    }

?>