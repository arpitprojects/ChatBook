<?php 
    require_once '../includes/connect.inc.php';
    

  function getData($params){
        $query = "SELECT `$params` FROM `user` WHERE `id` = '".$_SESSION['id']."'";
        $query_run = mysql_query($query);
        $mysql_result = mysql_result($query_run , 0 , $params);
        return $mysql_result;
    }
 ?>