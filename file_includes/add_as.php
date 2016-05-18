<?php require_once '../includes/connect.inc.php'; ?>
<?php require_once '../core/core.inc.php'; ?>
<?php 
    $user_logged_id = $_POST['user_logged_id'];
    $id = $_POST['id'];
    if(isset($user_logged_id) && isset($id)){
        if(!empty($user_logged_id) && !empty($id)){
            $query = "INSERT INTO `friend_request` VALUES ('', '$user_logged_id','$id')";
            $query_run = mysql_query($query);
            if($query_run){
                echo 'ok';
            }else{
                echo 'Sorry try! later';
            }
        }
    }
?>