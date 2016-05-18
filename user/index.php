<?php 
    require_once '../includes/connect.inc.php';
    require_once '../core/core.inc.php';//this has session ans function logged in
    //error_reporting(0);
?>
<?php
    //'FuturaStd-Book', 'FuturaStd-Medium'
    
    function getPara($params){
        if(isset($_GET['firstname']) && !empty($_GET['firstname'])){
        $firstname = $_GET['firstname'];   
       
        }else{
            $firstname = "ARPIT";
        }
        $query  = "SELECT `$params` FROM `user` WHERE `firstname` =  '$firstname'";
        $query_run = mysql_query($query);
        $mysql_result =  mysql_result($query_run , 0 , $params);
        return $mysql_result;
    }
    $image = getPara('image');
    $id = getPara('id');//jiska page khole hai uska id hai and image matbl get para se jo milega wo jiska khole hai uska hai
   // echo $id;
   // echo $image;
    //exit;
   
    
?>
<?php 
    //this is for the name who posted this to 
    $query  = "SELECT `firstname` , `lastname`,'id' FROM `user` WHERE `id` = '".$_SESSION['id']."'";
    $query_run = mysql_query($query);
    $firstname = mysql_result($query_run , 0 , 'firstname');
    $lastname = mysql_result($query_run , 0 , 'lastname');
    $user_logged_id = $_SESSION['id'];
    $name = strtoupper($firstname." ".$lastname);
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
        <link rel="stylesheet" href="../css/profile.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
        <script src="../node_modules\jquery\dist\jquery.js"></script>
     </head>
     <body>
         <?php 
            if(sessionset()){
         ?>
         <!--code here-->
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
                            <li class="text-info text-justify"><a href="../profile/profile.php">Home</a></li>
                            <li><a href="../friends/list.php">Friends</a></li>
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
         <aside>
              <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="timeline" style="background-image:url(../img/light_theme.png); background-position:50% 90%;">
                            <br><br><br><br><br>
                            <br><br><br><br><br>
                            <br>
                            <img  src="<?php echo $image; ?>" height="150" width="150" class="pull-lrft img img-responsive img-thumbnail"/>
                            <h4 id="name" class="text-justify text-deafult"><?php echo strtoupper(getPara('firstname')." ".getPara('lastname')); ?></h4>
                        <br><br><br/>
                        <?php 
                               
                                $query = "Select * from `friend_request` WHERE (`who`='$user_logged_id' AND `whom`= '$id') OR (`who`='$id' AND `whom`= '$user_logged_id')";
                                if($query_run =mysql_query($query)){
                                   if(mysql_num_rows($query_run) == 0){
                                       if($user_logged_id !== $id){
                                       echo ' <button id="add_as" class="btn btn-primary">Add as friend</button>';
                                       }else{
                                           echo '';
                                       }
                                   }else{
                                       echo '<p style="width:30%" class="alert alert-info">See Your friendship</p>';
                                       echo ' <button id="cancel" class="btn btn-primary">Cancel Request</button>';
                                   }
                                }else{
                                    echo 'query falied';
                                }
                         ?>
                       <script>
                        $('#add_as').click(function(){
                            var user_logged_id = <?php echo $user_logged_id;  ?>;
                            var id = <?php echo $id; ?>;
                          $.post({
                            url:'../file_includes/add_as.php', 
                            data :  {user_logged_id : user_logged_id , id: id } ,
                            success : function(data){
                                            console.log(data);
                                            location.reload();
                                        } ,
                                        error: function(xhr, status, error) {
                                        var err = eval("(" + xhr.responseText + ")");
                                        console.log(err.Message);
                            }
                            
                          });
                        });   
                       </script>
                       <script>
                           $('#cancel').click(function(){
                               var user_logged_id = <?php echo $user_logged_id;  ?>;
                            var id = <?php echo $id; ?>;
                              $.post({
                                 url: '../file_includes/del.php',
                                 data: {id:id ,user_logged_id:user_logged_id },
                            success : function(data){
                                            console.log(data);
                                            location.reload();
                                        } ,
                                        error: function(xhr, status, error) {
                                        var err = eval("(" + xhr.responseText + ")");
                                        console.log(err.Message);
                                        } 
                              }); 
                           });
                           </script>
                         </div>
                         <br><br><br>
                         <ul class="nav nav-pills" id="head_tagline">
                        <li role="presentation" class="active"><a href="#">Home</a></li>
                        <li role="presentation"><a href="#">Profile</a></li>
                        <li role="presentation"><a href="#">Messages</a></li>
                        <li role="presentation"><a href="#">Friends</a></li>
                        </ul>
                        <style>
                                #head_tagline li{
                                    margin-left:12%;
                                }
                            </style>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1" id="side_chat">
                        <br><br><br>
                        <ul id="chat-bar">
                            <?php 
                                $query= "SELECT `firstname` , `lastname` FROM `user`";
                                $query_run = mysql_query($query);
                                  while(($row = mysql_fetch_assoc($query_run))  !== false){
           
                                    echo  '<li>'.$row['firstname']. " ".$row['lastname'].'</li>';
                                }
                            ?>
                        </ul>
                    </div>
                    
                </div>
              </div>
         </aside>
         <br><br>
         <article>
            <div class="container">
                <div class="row">
                    <div classs="col-sm-8">
                        <div class="col-sm-5 col-sm-offset-3" id="sec_section">
                        <br>
                        <ul id="post">
                       <li> <p> <i class="fa fa-pencil-square-o"></i> Write Post :</p></li>
                       <li> <p><a href="#"><i class="fa fa-file-image-o"></i> Upload Picture</a></p></li>
                       <li><p><a href="#!"><i class="fa fa-film"></i> Create Photo Album</a></p></li>
                        </ul>
                        <div>
                        <textarea class="form-control" id="feeds" rows="3"></textarea>
                        <br>
                        <button  id="feed_post" class="btn btn-primary">Write Post</button>
                     </div>
                     <br><br>
                       
                            <!-- Card Projects -->
                           <?php 
                                $query = "SELECT * FROM  `news_feeds` WHERE `id` = '$id' ORDER BY feeds_id DESC";//ye $id jo profile khole hai uska hai
                                $query_run = mysql_query($query);
                                while($row = mysql_fetch_array($query_run)){
                           ?>
                                <div class="card">
                                    <div class="card-content">
                                        <strong><p class="pull-left text-info"><?php echo $row['temp_name']; ?></p></strong>
                                    <p class="pull-right"><?php echo  $row['time'];?></p>
                                    <br>
                                        <p><?php echo $row['feeds']; ?></p>
                                    </div>
                                    
                                    <div class="card-action">
                                        <a href="#"><i class="fa fa-thumbs-o-up"></i></a>
                                        <a href="#">Comment</a>
                                        <a href="#" >Share</a>
                                        
                                    </div>
                                </div>
                                <br>
                                <?php }
                                echo '<br>';
                                ?>
                            </div>
                                <script>    
                                      
                                $('#feed_post').click(function(){
                                    //ev.preventDefault();
                                    var feeds = $('#feeds').val();
                                    
                                    var id  = <?php echo getPara('id'); ?>;
                                    var name  = "<?php echo $name; ?>";
                                
                                if(feeds === ""){
                                    alert('Text Box is empty!');
                                } else{
                                    $.post({
                                        url : '../file_includes/user_posts.php',
                                        data : {feeds : feeds , id : id ,name:name },
                                        success : function(data){
                                            console.log(data);
                                            location.reload();
                                        } ,
                                        error: function(xhr, status, error) {
                                        var err = eval("(" + xhr.responseText + ")");
                                        console.log(err.Message);
                                        }
                                    });
                                }
                            });
                        </script>
                     </div>
                </div>
            </div>
         </article>
            <?php
            
            }else{
                echo '<center>';
                echo '<div class="alert alert-warning"> You are Not Logged in</div>';
                echo '<br/>';
                echo '<pre><a href="../login/login.php">Login</a></pre>';
                echo '</center>';
            }
         ?>
         
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/profile.js"></script>
          <script>
              
        $('#search').keyup(function(){  
                var search = $(this).val();
                $.post({
                    url : '../file_includes/search.php',
                    data : {search : search},
                    success : function(data){
                        $('.list-group').html(data);
                        location.reload();
                    },
                       error: function(xhr, status, error) {
                       var err = eval("(" + xhr.responseText + ")");
                       console.log(err.Message);
                     }
                });
            });
            </script> 
     </body>   
</html>