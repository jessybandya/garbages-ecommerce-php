<?php
include('config.php');
session_start();
$User1= $_SESSION['id'];
$User= $_SESSION['username'];

// define('name1', 'Omarion');
// $name = "Jessy Bandya";
// $age = 20;
// $phrase1 = "I am an Ekemoda\n";
// $phrase2 = "I am a bad guy";

// $products=[
// ['name'=>'Tomato','price'=>'20'],
// ['name'=>'Beans','price'=>'50'],
// ['name'=>'Dania','price'=>'15'],
// ['name'=>'pilipil','price'=>'10'],
// ];

// foreach ($products as $product) {
// 	echo $product['name'];
// 	echo "<br/>";
// }
//MYSQLi.....Connect to database
$conn = mysqli_connect('localhost','images','images','images');
if (!$conn) {
	echo "Connection error: " . mysqli_connect_error();
}
//write querry for all cars

$sql = "SELECT * FROM  clients WHERE  not id = $User1  ORDER BY id DESC";
//make query & get result

$result = mysqli_query($conn, $sql);

// fetch th eresulting rows as an array

$cars = mysqli_fetch_all($result, 3);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);


//print_r($cars);


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php include('templates/header.php'); ?>
<header >
	
        <img src="images/garbage.jpg" style="height: 70px;width: 70px;border-radius: 50px">
      
<hr>
<hr>
</header>

<main>
<h1>Start Conversation with</h1>
 
<div class="container">
	<div class="card-columns" class="row" class="card-columns">

		<?php foreach ($cars as $car) : ?>
             <div style="">
             	<div>
                     <?php $image_src = $car['image'];

                     

 ?> 
  

 <!-- <div class="bs-example">
    <div class="container" >
        <div class="row" >
            <div class="container" >
                <div class="card" >
                    <img src="<?php echo  $image_src; ?>"  class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Name</h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><?php echo htmlspecialchars($car['name']); ?></small>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>   -->
<!-- <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo  $image_src; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"> Name: <?php echo htmlspecialchars($car['name']); ?></h5>
    <p class="card-text">Category: <?php echo htmlspecialchars($car['category']); ?></p>
  </div>
</div>
 -->
<div class="">
<div class="">
  <div class="col-sm-6">
  <div class="card text-center"  style="width:400px;">
    <img class="card-img-top m-auto" src="<?php echo  $image_src; ?>" alt="Card image" style="width:150px;height:150px;border-radius: 200px">
    <div class="card-body">
      <h4 class="card-title" style="color: orange"> Username: <?php echo htmlspecialchars($car['username']); ?></h4>
      <p class="card-text" style="color: orange"> Name: <?php echo htmlspecialchars($car['first_name']); ?></p>
        <a href="message1.php?id=<?php echo $car['id']?>"><button style="background-color: orange;color: white">Click Here</button></a>
    </div>
  </div>
  </div>
  
</div>
</div>



  <!-- <a  href="details.php?id=<?php echo $car['id']?>">
     -->
                    
                               
                       </div>
             </div>
			
		<?php endforeach ?>	
	</div>
</div>



</main>
<?php include('templates/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>