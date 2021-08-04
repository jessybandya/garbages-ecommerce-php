<?php
error_reporting(0); 
?> 
<?php
session_start();
$User= $_SESSION['username'];
$User1= $_SESSION['id'];
 

  $msg = ""; 
  $name = $price = $weight = $category=  '';
$errors = array('name'=>'','price'=>'','weight'=>'','category'=>'');
  // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
  
    $filename = $_FILES["file"]["name"]; 
    $tempname = $_FILES["file"]["tmp_name"];     
        $folder = $filename;
   include('config.php');
    $id = mysqli_real_escape_string($conn, $_GET['id']);
   //make sql
   $sql = "SELECT * FROM clients WHERE id = $User1";
   //get the query result
   $result = mysqli_query($conn, $sql);

   // fetch result in array format
   $car = mysqli_fetch_assoc($result);
   $car_id =$car['id']; 
    

          
    $db = mysqli_connect("localhost", "images", "images", "images"); 
     
  
  
  
  
    if (array_filter($errors)) {
  //  echo "error in the form";
  }else{
    $name= mysqli_real_escape_string($db, $_POST['name']);
    $price= mysqli_real_escape_string($db, $_POST['price']);
    $weight= mysqli_real_escape_string($db, $_POST['weight']);
    $category= mysqli_real_escape_string($db, $_POST['category']);
    
    //create sql
    //save to db and check
    if(mysqli_query($db, $sql)){
      //success
          header('location: add.php');

    }else{
      // echo "query error" . mysqli_error($db);
                header('location: add.php');

    }
  






  
        // Get all the submitted data from the form 
        $sql = "INSERT INTO products(image,name,price,category,weight,client_id) VALUES ('$filename','$name','$price','$category','$weight','$car_id')"; 
      
        // Execute query 
        mysqli_query($db, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
    }
  } 
  $result = mysqli_query($db, "SELECT * FROM products"); 
?> <!DOCTYPE html>

<html>
<?php include('templates/header.php') ?>

<section style="background-color: orange;margin-top: 50px;border-radius: 20px" class="container  black-text" >

	<h4 class=" center" style="color: black">Add Your Garbage Here</h4>
	<form method="POST" action="sell.php" enctype="multipart/form-data"> 

      <input style="margin: 10px;width: 600px;border: white 1px solid;border-radius: 20px" placeholder="Garbage name" class="white" type="text" name="name" required>

    <input style="margin: 10px;width: 600px;border: white 1px solid;border-radius: 20px" placeholder="Garbage price" class="white" type="text" name="price" required>

    <input style="margin: 10px;width: 600px;border: white 1px solid;border-radius: 20px" placeholder="Garbage weight" class="white" type="text" name="weight" required>
        <input style="margin: 10px;width: 600px;border: white 1px solid;border-radius: 20px" placeholder="Garbage category(Solidify/Liguidify)" class="white" type="text" name="category" required>
        
          <input  style="margin-top: 20px" type="file" name="file" value="$img" id="upFile" accept=".png,.gif,.jpg,.webp" required/>
         




   <div class="center">
      <button style="margin-top: 10px;color: black;background-color: white" class="btn brand z-depth-0" type="submit" name="upload">UPLOAD</button>
    </div>
        
        </form> 
</section>
<?php include('templates/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

</html>