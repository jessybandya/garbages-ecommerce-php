<?php 
$conn =mysqli_connect('localhost','images','images','images');
session_start();
$user1=var_dump($_SESSION);
$User= $_SESSION['username'];
$User1= $_SESSION['id'];
if(isset($_POST['save'])){
$image = basename($_POST['file']);
$password = sha1($_POST['password']);

$sql = "UPDATE clients SET first_name= '$_POST[name1]',second_name ='$_POST[name2]',phone ='$_POST[phone]',email ='$_POST[email]',id_no ='$_POST[id_no]',username ='$_POST[username]',password ='$password',image ='$image' WHERE username = '$User'";
if(mysqli_query($conn,$sql)){
    header("location: profileview.php");
}else{
    echo "Not Updated";
}
}
  ?>