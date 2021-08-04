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

 $sql = "SELECT * FROM products WHERE client_id = $User1";
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
</head>
<body>
<?php include('templates/header.php'); ?>
<header >
	
        <img src="images/garbage.jpg" style="height: 70px;width: 70px;border-radius: 50px">
      <a href="sell.php">
	<button style="margin-left: 1300px;background-color: orange" class="btn btn-info btn-pressure btn-sensitive">Sell</button>
</a>
<hr>
<hr>
</header>

<main>
<h1>My Sold Garbages</h1>
<div class="container-fluid">
	<div class="card-columns" class="row" class="card-columns">
		<?php foreach ($cars as $car) : ?>
             <div style="display: inline-block;margin: 2px;">
             	<div>
                     <?php $image_src = $car['image'];

                     

 ?>                     <a  href="details1.php?id=<?php echo $car['id']?>">
                         <img class='card-img-top img-fluid  border-0' style='object-fit: cover;border-radius: 10px'  src="<?php echo  $image_src; ?>">
                               </a>
                               <div class='card-block'>
                                <h6 class='card-title' style='text-align:center'>Car id: 
                  <?php echo htmlspecialchars($car['id']); ?>
                                    <h6 class='card-title' style='text-align:center'>Name: 
             			<?php echo htmlspecialchars($car['name']); ?>
                                        
                                    
                        </div>
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