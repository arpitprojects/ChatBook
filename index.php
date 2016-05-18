<?php
    require_once 'includes/connect.inc.php';
    require_once 'core/core.inc.php';
?> 
<!DCOTYPE html>
<html>
     <head>
         <title>
               Chatbook
         </title>
        <meta charset="UTF-8"><!--for chars -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- meta viewport-->
        <link rel="stylesheet" href="css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap-theme.css" type="text/css"/>
        <link rel="stylesheet" href="css/main.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
     </head>
     <body>
         <!--code here-->
       
         <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                       <h1 id="logo"> Chatbook</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  col-sm-offset-1">
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
                                             header('Location:login/login.php');
                                             ob_end_flush();
                                        }else{
                                            $mysql_result = mysql_result($query_run , 0 , 'id');
                                            $_SESSION['id'] = $mysql_result;
                                           header('Location:profile/profile.php');
                                           ob_end_flush();
                                            
                                        }
                                    }else{
                                        echo 'Not Successful';
                                        header('Location:login/login.php'); 
                                       ob_end_flush();
                                    }
                                }else{
                                    echo 'Not empty Password/Email';
                                }
                            }
                        ?>
                        <br>
                       
                        <form class="form-inline" method="POST" action="index.php"> 
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
                        </form>
                        
                    </div>
                </div>
            </div>
         </header>
         <section>
               <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1" id="front-image">
                            <br><br>
                            <img src="img/front.png" alt="Front-Image" class="img img-responsive"/>
                            <h3 class="text-justify">We Hope To see you soon!</h3>
                            <br>
                            <h6 class="text-justify">Currently we support English(U.s) only</h6>
                        </div>
                        <div class="col-sm-4 col-sm-offset-1">
                            <h2 class="bold">Sign Up</h2>
                                     <h4>It's free and always will be.</h4>
                            <?php
                                if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['c_email']) && isset($_POST['password']) && isset($_POST['sex']) && isset($_POST['bday'])){
                                    $firstname = $_POST['firstname'];
                                    $lastname = $_POST['lastname'];
                                    $email = $_POST['email'];
                                    $c_email = $_POST['c_email'];
                                    $password = $_POST['password'];
                                    $sex = $_POST['sex'];
                                    $bday = $_POST['bday'];
                                    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($c_email) && !empty($password) && !empty($sex) && !empty($bday)){
                                      if($email === $c_email){
                                          $query = "SELECT `email` FROM user WHERE `email` = '$email'";
                                          $query_run = mysql_query($query);
                                          $mysql_num_rows = mysql_num_rows($query_run);
                                          if($mysql_num_rows === 0){
                                              
                                              $query = "INSERT INTO `user` VALUES ('','$firstname','$lastname','$email','$password','$bday','$sex','')";
                                              if(mysql_query($query)){
                                              
                                              echo 'Registered';
                                              $query  ="Select `id` From `user` WHERE `firstname` = '$firstname'";
                                              $query_run = mysql_query($query);
                                              $id = mysql_result($query_run , 0 ,'id' );
                                              $_SESSION['id'] = $id;
                                              
                                              header('Location:profile/uploads.php');
                                              ob_end_flush();
                                              }else{
                                                  echo 'Try After Sometime!!';
                                              }
                                          }else{
                                              echo 'You are alredy Registered';
                                          }
                                      } else{
                                          echo 'Email/Phone Retype does not match';
                                      }
                                    }
                                }
                            ?>
                            <form class="form-group" method="POST" action="index.php">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label class="sr-only" for="f_name">First Name</label>
                                        <input type="text" class="form-control" id="f_name" name="firstname" placeholder="FirstName">
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="sr-only" for="surname">Surname</label>
                                        <input type="text" class="form-control" id="surname" name="lastname" placeholder="LastName">
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email/Phone</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email/Phone">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="c_email">Retype Email/Phone</label>
                                    <input type="text" class="form-control" id="c_email" name="c_email" placeholder="Retype Email/Phone">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="password">New Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="New Password">
                                </div>
                                <br>
                                <div class="form-group">
                                     Birthday:
                                        <input type="date" name="bday" class="form-control"/>
                                </div>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" id="inlineRadio1" value="male"> Male
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="sex" id="inlineRadio2" value="female"> Female
                                    </label>
                                    <p class="text-justify">By Clicking sign Up you will be agreeing to all our terms and conditions</p>
                                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                            </form>
                           <h6> &copy; Chatbook 2016 -  </h6> 
                        </div>                        
                    </div>
               </div>
         </section>
         <?php 
         if(sessionset()){
           header('Location:profile/profile.php');
           ob_end_flush();
          }
         ?>
         <script src="node_modules\jquery\dist\jquery.js"></script>
         <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="js/script.js"></script>
     </body>        
</html>
    