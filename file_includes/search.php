<?php
require '../includes/connect.inc.php';

if(isset($_POST['search']) == true && empty($_POST['search']) == false){
        $search= mysql_real_escape_string($_POST['search']);
        $query = mysql_query("SELECT `firstname` , `lastname` FROM `user` WHERE `firstname` LIKE '$search%' OR `lastname` LIKE '$search%'");
        $firstname = "Arpit";
        while(($row = mysql_fetch_assoc($query))  !== false){
           // echo $row['firstname'];
            //loopblibjb
            echo  '<a href="../user/index.php?firstname='.$row['firstname'].'"><li class="list-group-item">' .$row['firstname'].' '.$row['lastname'].'</li></a>';
        }
}

?>

