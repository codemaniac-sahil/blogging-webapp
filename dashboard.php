<?php
session_start();
if (!isset($_SESSION['username'])){
    header('location:login.html');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iBlogger - User Dashboard</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="navbar">
        <div class="logo">
            <p><h1><a href="index.html">iBlogger</a></h1></p>
           

        </div>
        <div class="left-nav">
            <ul class="navlinks">
              
                <li><a href="#">About us</a></li>
                <li><a href="Logout.php" id="login">Logout</a></li>
               

            </ul>
        </div>
</div>
   <div class="sidebar">
       <img src="img_avatar2.png" alt="Avatar">
       <ul class="sidebar-links">
       

           <li><?php echo ucfirst($_SESSION['username'])?></li>
           <li><a href="#">Home</a></li>
           <li><a href="#">Dashboard</a></li>
           
           <li><a href="add.html">Add a blog</a></li>
           <li><a href="#">Settings</a></li>
           <li><a href="logout.php">Logout</a></li>




        </ul>
   </div>
   <div class="container">
       <?php
       $server="localhost";
       $user="root";
       $pass='';
       $db="blogsystem";
       $con=mysqli_connect($server,$user,$pass,$db);
       $sql="select * from add_blog;";
       $res=mysqli_query($con,$sql);
       $row=mysqli_num_rows($res);
       if ($row==0){
           echo"<h1>No post yet </h1><a href='add.html'>Add a blog</a>";
       }
       else{
           while ($r=mysqli_fetch_assoc($res)){
               echo "<h1>".ucfirst($r['title'])."</h1>";
               ?>
               <div class="date-time">
                   <div class="date">
                   <?php

               echo "<h6>". "Date "." : ".$r['date']."</h6>";
               ?>
                   </div>
                   <div class="time">
               <?php
               echo "<h6>". "Time "." : ".$r['time']."</h6>";
               
               ?>
               </div>
               </div>
            <?php
               echo "<p> Author" ." ".":"." ".ucfirst($r['author'])."</p>";
               echo "<p>" .ucfirst($r['discription'])."</p>";
               

           }
           echo"<a href='add.html'>Add another blog</a>";
       }
       ?>
    
       

   </div>
    <div class="add-blog">
        <a href="add.html">
    <img src="plus.svg" alt="add symbol">
        </a>
    </div>
</body>
</html>