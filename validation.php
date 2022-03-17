<?php
session_start();
header('location:login.html');
$server="localhost";
$user="root";
$pass='';
$db="blogsystem";
$con=mysqli_connect($server,$user,$pass,$db);
if ($con){
    echo"connection established<br>";
}
else{
    echo" failed to establishing connection";
}
$username=$_POST['uname'];
$password=$_POST['pwd'];
$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$sql="select* from signup where u_name='$username' and password='$password'; ";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);

if ($num==1){
    $_SESSION['username']=$username;
    header('location:dashboard.php');

}
else{
    header('location:login.html');
    
}
?>