<?php
$conn = mysqli_connect('localhost','images','images','images');
$sql = "SELECT SUM(price) AS total FROM products";
$result=mysqli_query($conn,$sql);
$values= mysqli_fetch_assoc($result);
$cars=$values['total'];
$sql1 = "SELECT COUNT(price) AS count FROM products";
$result1=mysqli_query($conn,$sql1);
$values1= mysqli_fetch_assoc($result1);
$cars1=$values1['count'];
$sql1 = "SELECT COUNT(id) AS count FROM clients";
$result2=mysqli_query($conn,$sql1);
$values2= mysqli_fetch_assoc($result2);
$cars2=$values2['count'];
$sql2 = "SELECT COUNT(id) AS count FROM reports";
$result3=mysqli_query($conn,$sql2);
$values3= mysqli_fetch_assoc($result3);
$cars3=$values3['count'];

?>
<!DOCTYPE html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/sum.css">
<html>
<?php include('templates/headerA.php'); ?>

    <div class="container" >


        <div class="row">
            <div style="display: inline-block;" class="my_card">

                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked admin-menu" >
                        <li><a href="" data-target-id="profile"><i></i></a></li>
                        <li><a href="" data-target-id="change-password"><i ></i> </a></li>
                        <li><a href="" data-target-id="settings"><i></i></a></li>
                        <li><a href="" data-target-id="logout"><i></i></a></li>
                    </ul>
                </div>

                <div class="col-md-9  admin-content" id="profile">
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading" style="background-color: green;background-color: green;width: 900px;color: white;border: green 1px dotted">
                            <h3 class="panel-title">Number of garbage products</h3>
                        </div>
                        <div class="panel-body">
                            <p><h4><b>Total: <?php  echo $cars1; ?></b></h4></p>
                        </div>
                    </div>
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading" style="background-color: green;background-color: green;width: 900px;color: white">
                            <h3 class="panel-title">Total garbage cost</h3>
                        </div>
                        <div class="panel-body">
                            <p><h4><b>Total: Ksh <?php  echo $cars; ?></b></h4></p>
                        </div>
                    </div>
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading" style="background-color: green;width: 900px;color: white">
                            <h3 class="panel-title">Number of clients</h3>

                        </div>
                        <div class="panel-body">
                            <p><h4><b>Total: <?php  echo $cars2; ?></b></h4></p>
                        </div>
                    </div>
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading" style="background-color: green;width: 900px;color: white">
                            <h3 class="panel-title">Number of reports</h3>

                        </div>
                        <div class="panel-body">
                            <p><h4><b>Total: <?php  echo $cars3; ?></b></h4></p>
                        </div>
                    </div>

                </div>





            </div>




        </div>
    </div>

</div>
<?php include('templates/footerA.php');?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</html>