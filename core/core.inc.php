<?php
    
    session_start();
    ob_start();
    
    
    function sessionset(){
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }
?>