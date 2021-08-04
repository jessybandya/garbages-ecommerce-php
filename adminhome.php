<?php
include('config.php');
session_start();


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
include_once "search.php";
$conn = mysqli_connect('localhost','images','images','images');
if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}
//write querry for all cars
if(isset($USER_HAS_SEARCHED)){
    $cars = $arr;
}else{

    $sql = "SELECT * FROM  products  WHERE category='solidify'";
//make query & get result

    $result = mysqli_query($conn, $sql);

// fetch th eresulting rows as an array

    $cars = mysqli_fetch_all($result, 3);

//free result from memory
    mysqli_free_result($result);
    $sql1 = "SELECT * FROM  products  WHERE category='liquidify'";
//make query & get result

    $result1 = mysqli_query($conn, $sql1);

// fetch th eresulting rows as an array

    $cars1 = mysqli_fetch_all($result1, 3);

//free result from memory
    mysqli_free_result($result1);
    //close connection
    mysqli_close($conn);


//print_r($cars);
}




?>
<!DOCTYPE html>
<html>
<head>
    <title></title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .bs-example{
            margin: 20px;
        }
    </style>
</head>
<body>
<?php include('templates/headerA.php'); ?>
<header >

    <img src="images/garbage.jpg" style="height: 70px;width: 70px;border-radius: 50px">


</header>

<main>

    <?php
    if(isset($USER_HAS_SEARCHED)){?>
        <h1>Showing search results for <?php htmlspecialchars($_GET['query'])?></h1>
    <?php}else {?>
        <h1></h1>
    <?php } ?>
    <hr/>
    Solidify
    <hr/>
    <div class="container">
        <div class="card-columns" class="row" class="card-columns">

            <?php foreach ($cars as $car) : ?>
                <div style="">
                    <div>
                        <?php $image_src = $car['image'];



                        ?>
                        <a  href="detailsA.php?id=<?php echo $car['id']?>">

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
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?php echo  $image_src; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 style="color: green" class="card-title"> Name: <?php echo htmlspecialchars($car['name']); ?></h5>
                                    <p style="color: green" class="card-text">Category: <?php echo htmlspecialchars($car['category']); ?></p>
                                </div>
                            </div>
                        </a>
                        <!-- <a  href="details.php?id=<?php echo $car['id']?>">
     -->


                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
    <hr />
    Liquidify
    <hr />
    <div class="container">
        <div class="card-columns" class="row" class="card-columns">

            <?php foreach ($cars1 as $car) : ?>
                <div style="">
                    <div>
                        <?php $image_src = $car['image'];



                        ?>
                        <a  href="detailsA.php?id=<?php echo $car['id']?>">

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
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="<?php echo  $image_src; ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 style="color: green" class="card-title"> Name: <?php echo htmlspecialchars($car['name']); ?></h5>
                                    <p style="color: green" class="card-text">Category: <?php echo htmlspecialchars($car['category']); ?></p>
                                </div>
                            </div>
                        </a>
                        <!-- <a  href="details.php?id=<?php echo $car['id']?>">
     -->


                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>


</main>
<?php include('templates/footerA.php'); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>