<?php
session_start();
var_dump($_SESSION);
$User1= $_SESSION['id'];
$User= $_SESSION['username'];

require("config.php");
$q = "SELECT * FROM clients JOIN products ON clients.id= products.client_id";
$r = mysqli_query($conn,$q);
$a1 = mysqli_fetch_assoc($r);
$a=var_dump($a1);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/profileview.css">
</head>
<body>

    <?php include('templates/header.php'); ?>
    <?php echo htmlspecialchars($a1['first_name']); ?>

    <?php include('templates/footer.php'); ?>
              
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>