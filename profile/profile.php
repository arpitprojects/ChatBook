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
        <link rel="stylesheet" href="../css/profile.css" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'><!--font family-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'><!--for logo-->
     </head>
     <body>
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
         <br><br><br><br>
         <?php 
            if(sessionset()){
                
            
         ?>
         <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-2" id="fir_section">
                        <ul class="fir_panel">
                            <li><i class="fa fa-user"></i> <a href="#!"><?php echo $name;?></a></li>
                            <img src="<?php echo $image; ?>" height="100" width="100" class="img img-responsive img-thumbnail"/>
                            <li><i class="fa fa-product-hunt"></i>  <a href="#!">Edit Profile</a></li>
                            <p class="text-info">Favourite</p>
                            <li><i class="fa fa-newspaper-o"></i>  <a href="#!">News Feeds</a></li>
                            <li><i class="fa fa-weixin"></i>  <a href="#!">Messages</a></li>
                            <li><i class="fa fa-users"></i>  <a href="#!">Groups</a></li>
                            <li><i class="fa fa-user-secret"></i>  <a href="#!">Safe Groups</a></li>
                            <p class="text-info">Groups</p>
                            <li><i class="fa fa-industry"></i>  <a href="#!">Your Group</a></li>
                            <li><i class="fa fa-pencil-square-o"></i>  <a href="#!">New Group</a></li>
                             <p class="text-info">Events</p>
                            <li><i class="fa fa-industry"></i>  <a href="#!">Your Event</a></li>
                            <li><i class="fa fa-pencil-square-o"></i>  <a href="#!">New Event</a></li>
                            
                         </ul>
                    
                    </div>
                    <div class="col-sm-5 col-xs-12" id="sec_section">
                        <br>
                        <ul id="post">
                       <li> <p> <i class="fa fa-pencil-square-o"></i> Write Post :</p></li>
                       <li> <p><a href="#"><i class="fa fa-file-image-o"></i> Upload Picture</a></p></li>
                       <li><p><a href="#!"><i class="fa fa-film"></i> Create Photo Album</a></p></li>
                        </ul>
                        <form>
                     <textarea class="form-control" id="feeds" name="feeds" rows="3"></textarea>
                        <br>
                        <button type="click" id="feed_post" class="btn btn-primary btn-justify">Write Post</button>
                     </form>
                     <br><br>
                       
                            <!-- Card Projects -->
                           <?php 
                                $query = "SELECT * FROM  `news_feeds` WHERE `id` = '$id' ORDER BY feeds_id DESC";
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
                    <div class="col-sm-3" id="thi_section">
                        <h3>Your Pages</h3>
                        <br>
                        <div class="third_second_section">
                            <br><br>
                            Malaysia: 7.5-Meter-Long Python Dies After Laying Egg in Captivity, Defense Official Says

                            <br><br>
                            #SultanTeaser: Teaser Released for Upcoming Salman Khan Starrer Film

                            <br><br>
                            HTC: Technology Company Announces New HTC 10 Flagship Smartphone

                            <br><br>
                            Gears of War 4: Microsoft Releases Trailer for Upcoming 3rd-Person Shooter

                             <br><br>
                            Kanye West: Rapper Discusses Alleged Feud With Taylor Swift During Philippines Concert
                            <br><br>
                         </div>
                         <br>
                        <div class="third_third_section">
                                English (US) · English (UK) · বাংলা · हिन्दी · اردو · नेपाली
                         </div>
                         <br>
                    </div>
                    <div class="col-sm-2" id="for_section">
                        <ul id="chat-list">
                            <br><br>
                            <?php 
                                $query= "SELECT `firstname` , `lastname` FROM `user`";
                                $query_run = mysql_query($query);
                                  while(($row = mysql_fetch_assoc($query_run))  !== false){
           
                                    echo  '<strong><li>'.strtoupper($row['firstname']). " ".strtoupper($row['lastname']).'</li></strong>';
                                }
                            ?>
                         </ul>
                    
                    </div>
                </div>
            </div>
         </section>
         <?php
            }else{
                echo '<center>';
                echo '<div class="alert alert-warning"> You are Not Logged in</div>';
                echo '<br/>';
                echo '<pre><a href="../login/login.php">Login</a></pre>';
                echo '</center>';
            }
         ?>
         <script src="../node_modules\jquery\dist\jquery.js"></script>
         <script src="../node_modules\bootstrap\dist\js\bootstrap.js"></script>
         <script src="../js/profile.js"></script>
         <script>
            $('#feed_post').click(function(){
                var feeds = $('#feeds').val();
                
                var id  = <?php echo $id; ?>;
                
               if(feeds === ""){
                   alert('Text Box is empty!');
                   return false;
               } else{
                   $.post({
                      url : '../file_includes/posts.php',
                      data : {feeds : feeds , id : id},
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


