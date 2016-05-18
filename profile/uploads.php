<?php
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
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
        <link rel="stylesheet" href="../css/reset.css" type="text/css"/>
        <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap-theme.css" type="text/css"/>
        <link rel="stylesheet" href="../css/main.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
     </head>
     <body>
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
                      <center>  <h3>Upload Picture into Chatbook</h3>
                      <?php
                        if(isset($_FILES['image']['tmp_name'])){
                            $tmpname = $_FILES['image']['tmp_name'];
                            $name = $_FILES['image']['name'];
                            $path = '../Profile-Pictures/'.$name;
                            $id = $_SESSION['id'];
                            
                            if(!empty($tmpname)){
                                move_uploaded_file($tmpname , $path);
                                $query = "UPDATE `user` SET `image` = '$path'  WHERE `id` = '".$_SESSION['id']."'";
                                $query_run = mysql_query($query);
                                if($query_run){
                                    echo 'Successful Upload';
                                    header('Location:profile.php');
                                    ob_end_flush();
                                }else{
                                    echo 'Try After Sometime';
                                }
                            }else{
                                echo 'Input box is empty';
                            }
                        }
                   
                        ?>
                        <br><br><br>
                        </center>
                        <?php 
                            if(sessionset()){
                        ?>
                        <form class="form-group" method="POST" action="uploads.php" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label for="exampleInputFile">Picture Upload</label>
                                <input type="file" id="exampleInputFile" name="image">
                                <p class="help-block">This will help for finding more friends</p>
                            </div>
                            <button class="btn btn-primary" type="submit">Go</button>
                        </form>   
                        <?php 
                          }else{
                              echo 'Sorry some problem is going on!!';
                          }
                        ?>
                    </div>   
                    
                </div>    
                
            </div>  
          </section>
              
              
         <script src="../node_modules\jquery\dist\jquery.js"></script>
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/script.js"></script>
     </body>        
</html>
         
         <script src="../node_modules\jquery\dist\jquery.js"></script>
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/script.js"></script>
     </body>        
</html>
    