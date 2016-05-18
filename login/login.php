<?php
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
?> 
<!DCOTYPE html>
<html>
     <head>
         <title>
               Chatbook Login
         </title>
        <meta charset="UTF-8"><!--for chars -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- meta viewport-->
        <link rel="stylesheet" href="../css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap-theme.css" type="text/css"/>
        <link rel="stylesheet" href="../css/main.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
     </head>
     <body style="background-color:#E9EAED;">
         <!--code here-->
           <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                       <h1 id="logo"> Chatbook <a href="../index.php" class="btn btn-primary">Sign up</a> </h1>
                       
                       <br>
                </div>
             </div>
          </div>  
          </header>
          <br><br><br><br>
          <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4" style="background-color:white;">
                      <center>  <h3>Login in to Chatbook</h3>
                       <?php
                            if(isset($_POST['email']) && isset($_POST['password'])){
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                if(!empty($email) && !empty($password)){
                                    $query = "SELECT `id` from user where `email`= '$email' AND `password`=  '$password'";
                                    if($query_run = mysql_query($query)){
                                        $mysql_num_rows = mysql_num_rows($query_run);
                                        if($mysql_num_rows === 0){
                                            echo 'Invalid Username/Password';
                                        }else{
                                            $mysql_result = mysql_result($query_run , 0 , 'id');
                                            $_SESSION['id'] = $mysql_result;
                                            header('Location:../profile/profile.php');
                                            ob_end_flush();
                                            
                                        }
                                    }else{
                                        echo 'Not Successful';
                                    }
                                }else{
                                    echo 'Not empty Password/Email';
                                }
                            }
                        ?>
                        <br>    <br><br>
                        </center>
                        <form class="form-group" method="POST" action="login.php"> 
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email/Phone:</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email/Phone">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sign in</button>
                            <p><a href="#">Forgot Password</a></p>
                        </form>
                        
                    </div>   
                    
                </div>    
                
            </div>  
          </section>
              
              
         <script src="../node_modules\jquery\dist\jquery.js"></script>
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/script.js"></script>
     </body>        
</html>
    