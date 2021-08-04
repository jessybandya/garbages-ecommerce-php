<?php
session_start();
require("config.php");
$q = "SELECT * FROM clients WHERE username='".$_SESSION["username"]."'";
$r = mysqli_query($conn,$q);
$a = mysqli_fetch_assoc($r);
$User= $_SESSION['username'];
$User1= $_SESSION['id'];
if(isset($_POST['save'])){
$image = basename($_POST['file']);
$password = sha1($_POST['password']);

$sql = "UPDATE clients SET first_name= '$_POST[name1]',second_name ='$_POST[name2]',phone ='$_POST[phone]',email ='$_POST[email]',id_no ='$_POST[id_no]',image ='$image' WHERE username = '$User'";
if(mysqli_query($conn,$sql)){
    header("location: profileview.php");
}else{
    echo "Not Updated";
}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>
<body>
	<?php include('templates/header.php'); ?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        
        <div class=' border-right '>
            <div class='p-3 py-5'>
                <div class='d-flex justify-content-between align-items-center mb-3'>
                    <h4 class='text-right'>Profile Editting</h4>
                </div>
 
   
    <form action='profileedit.php'  method='post'>
       
     <div style='float right' style='border-radius:200px'>
        <img style='width:200px;height:200px:border-radius:200px' src='<?php echo ($a['image']) ?>'></div>
        
       

        <div class='row mt-2'>    
        <div class='col-md-6'><label class='labels'>First Name</label>
                    <input type='text' name='name1' class='form-control' value='<?php echo htmlspecialchars($a['first_name']); ?>'></div>
        
        <div class=col-md-6><label class=labels>Second Name</label>
                    <input type=text class=form-control name=name2 value='<?php echo htmlspecialchars($a['second_name']); ?>'></div>
        <div class=col-md-6><label class=labels>Phone</label>
                    <input type=text class=form-control name=phone value='<?php echo htmlspecialchars($a['phone']); ?>'></div>
        <div class=col-md-6><label class=labels>ID No.</label>
                    <input type=text class=form-control name=id_no value='<?php echo htmlspecialchars($a['id_no']); ?>'></div>            
       <!-- <div class=col-md-6><label class=labels>Username</label>
                    <input type=text class=form-control name=username value='<?php echo htmlspecialchars($a['username']); ?>'></div> 
      <div class=col-md-6><label class=labels>Password</label>
                    <input type=text class=form-control name=password value='<?php echo htmlspecialchars($a['password']); ?>'></div> -->               
         </div> 
         <div class=row mt-2>   
        <div class=col-md-6><label class=labels>Email</label>
                    <input type=text name=email class=form-control value='<?php echo htmlspecialchars($a['email']); ?>'></div>
         
        
        
                    
        
                    

        </div>
       <div>
            <input type=hidden name=id value='<?php echo htmlspecialchars($a['id']); ?>'> 
            <div style='margin-top:20px' class=col-md-6><label class=labels>Change/Add Photo</label><input class=file btn form-control  type='file' name='file' ></div> 
            <div class=mt-5 text-center ><button name=save class=btn btn-primary profile-button type=submit>Save Profile</button></div>
                  
      </form>
   


  


  
</div>
</div>
</div>
</div>
	<?php include('templates/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>