<?php
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
    
    
    session_destroy();
    header('Location:../login/login.php');
?>