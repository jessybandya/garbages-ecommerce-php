<?php
require('config.php');
session_start();

$User1= $_SESSION['id'];
$User= $_SESSION['username'];
if(!isset($_SESSION['username'])) { //if not yet logged in
    header("Location: a.php");// send to login page
    exit();
}
$q = "SELECT * FROM `reports`join clients on clients.id = reports.from_id";
$r = mysqli_query($conn,$q);
$reports_result = mysqli_fetch_all($r,3);

$conn = mysqli_connect('localhost','images','images','images');
if (!$conn) {
    echo "Connection error: " . mysqli_connect_error();
}
//write querry for all cars

$sql1 = "SELECT * FROM  reports";

// This query
//$sql = "SELECT * FROM chats inner join clients on clients.id = chats.to_id WHERE  chats.to_id = $User1 and seen = 0 ORDER BY id DESC";

//make query & get result

$result1 = mysqli_query($conn, $sql1);

// fetch th eresulting rows as an array

//update query


$clients = mysqli_fetch_all($result1, 3);

//free result from memory
mysqli_free_result($result1);

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
<?php include('templates/headerA.php'); ?>
<header >

    <img src="images/garbage.jpg" style="height: 70px;width: 70px;border-radius: 50px">

    <hr>
    <hr>
</header>

<main>

    <div class="container">
        <div class="card-columns" class="row" class="card-columns">

            <?php foreach ($reports_result as $report_item) : ?>
                <div style="">
                    <div>
                        <?php  $image_src = $report_item['image'];
                        ?>



  </div>
</div>

                        <?php

                        $sql = "select count(*) from reports where  seen =0 and from_id = $report_item[from_id]";
                        $result = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_all($result)[0][0];
                        ?>
                        <div class="">
                            <div class="">
                                <div class="col-sm-6">
                                    <div class="card text-center"  style="width:400px;">

                                        <img class="card-img-top m-auto" src="<?php echo  $image_src; ?>" alt="Card image" style="width:150px;height:150px;border-radius: 200px">
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: green"> Username: <?php echo htmlspecialchars(($report_item['username'])); ?></h4>
                                            <p class="card-text" style="color: green"> Name: <?php echo htmlspecialchars(($report_item['first_name'])); ?></p>

                                            <a href="reportView.php?id=<?php echo $report_item['id']?>"><button style="background-color: green;color: white">Click Here</button></a>
                                        </div>
                                        <?php echo $result;   ?>

                                    </div>
                                </div>

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
