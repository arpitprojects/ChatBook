<?php
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';
    require_once '../core/include.php';
?> 
<?php
    $name  = getData('firstname') . " ".getData('lastname');
    $name = strtoupper($name);
    
    $image = getData('image');
    $id = $_SESSION['id'];
    
?>
    
<!DOCTYPE html>
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
        <link rel="stylesheet" href="../css/list.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
     </head>
     <body>
         <!--code here-->
         <?php
         if(!sessionset()){
            echo '<center><pre>You Must Login- <br><a href="../login/login.php">Login Page</a></pre></center>';
         }else{    
          ?>
          <!--All code here-->
          <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2 ">
                       <h4 id="logo"> Chatbook</h4>
                    </div>
                    <div class="col-sm-4" id="search-panel">
                         <div class="">
                            <div class="input-group">
                            <input  id="search" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                            </span>
                            </div><!-- /input-group -->
                            <ul class="list-group"></ul>
                    </div>
                </div>
                 <div class="col-sm-4">
                        <ul id="head_list">
                            <li class="text-info text-justify"><a href="#!">Home</a></li>
                            <li><a href="#!">Friends</a></li>
                            <li><a href="#!">Messages</a></li>
                            <li><a href="#!">Notifications</a></li>
                         </ul>
                    
                    </div>
                    <div class="col-sm-2">
                        <ul id="head_last">
                           <li><a href="../logout/index.php">Logout</a></li>
                           <li><a href="#!"><i class="fa fa-cog fa-lg fa-spin"></i></a></li>
                        </ul>
                    </diV>
                        
             </div>
         </header>
         <br/><br/><br/>
         <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php 
                            $query = "SELECT * FROM `friend_request` WHERE (`who` = '$id') OR (`whom` = '$id')";
                            $query_run = mysql_query($query);
                            $mysql_num_rows  = mysql_num_rows($query_run);//sahi ja reya hain
                            while($row = mysql_fetch_assoc($query_run) ){
                               echo $temp_id = $row['who'];
                                $i = 0;
                               echo $temp_id1 = $row['whom'];
                                echo '<br>';
                                  if($temp_id !== $id){
                                            $query = "SELECT * FROM `user` WHERE `id` = '$temp_id'";
                                            $query_run = mysql_query($query);
                                            $temp_name1 = mysql_result($query_run , $i , 'firstname');
                                            $temp_name2 = mysql_result($query_run , $i , 'lastname');
                                            $image = mysql_result($query_run , $i , 'image');
                                            $temp_name = strtoupper($temp_name1." ".$temp_name2); 
                                            
                                        ?>
                                        <div class="card">
                                        <div class="card-content">
                                            <strong><center><p class="pull-left text-info"><?php echo $temp_name; ?></p></center></strong>
                                            <br/>
                                            <img src="<?php echo $image; ?>" alt="image" height="150" width="150"/>
                                        <br>
                                        </div>
                                        
                                        <div class="card-action">
                                            
                                            <a href="../user/index.php?firstname=<?php echo $temp_name1;?>">VieW Profile</a>
                                            
                                            
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                        $query = "SELECT * FROM `user` WHERE `id` = '$temp_id1'";
                                        $query_run = mysql_query($query);
                                        $temp_name1 = mysql_result($query_run , $i , 'firstname');
                                        $temp_name2 = mysql_result($query_run , $i , 'lastname');
                                        $image = mysql_result($query_run , $i , 'image');
                                        $temp_name = strtoupper($temp_name1." ".$temp_name2);
                                    
                                    ?>
                                        <div class="card">
                                        <div class="card-content">
                                            <strong><center><p class="pull-left text-info"><?php echo $temp_name; ?></p></center></strong>
                                            <br/>
                                            <img src="<?php echo $image; ?>" alt="image" height="150" width="150"/>
                                        <br> 
                                        </div>
                                        
                                        <div class="card-action">
                                            <a href="../user/index.php?firstname=<?php echo $temp_name1;?>">View Profile</a>
                                        </div>
                                    </div>
                                    
                                <?php
                                }
                            }//while loop closed
                        ?>
                    </div>
                </div>
            </div>
         </section>
         
         
          <?php  
         }
         ?>
         
          <script src="../node_modules\jquery\dist\jquery.js"></script>
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/profile.js"></script>
      </body>        
</html>

