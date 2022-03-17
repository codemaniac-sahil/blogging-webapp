<?php
header('location:dashboard.php');

$server="localhost";
$user="root";
$pass='';
$db="blogsystem";
$con=mysqli_connect($server,$user,$pass,$db);

$title=$_POST['title'];
$author=$_POST['author'];
$blog=$_POST['content'];
$date = date('Y-m-d');
$time=date('h:i:s',time());

$sql="insert into add_blog (title,author,discription,date,time) values('$title','$author','$blog','$date','$time');";
mysqli_query($con,$sql);

    

?>