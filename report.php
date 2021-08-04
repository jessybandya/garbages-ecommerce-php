<?php
session_start();
require("config.php");

$User= $_SESSION['username'];
$User2= $_SESSION['id'];

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //make sql
    $q = "SELECT * FROM clients as a INNER JOIN  products as b  ON a.id= b.client_id WHERE a.id=$_GET[id]";
    $r = mysqli_query($conn,$q);
    $a1 = mysqli_fetch_assoc($r);
    $client_id = $a1["client_id"];

}

$desc = '';
$errors = array('desc' => '');
if (isset($_POST['send'])) {
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        //make sql
        $q = "SELECT * FROM clients as a INNER JOIN  products as b  ON a.id= b.client_id WHERE a.id=$_GET[id]";
        $r = mysqli_query($conn,$q);
        $a1 = mysqli_fetch_assoc($r);
        $client_id = $a1["client_id"];
    }

    include('config.php');


    $id = $a1['client_id'];
    //make sql
    $sql = "SELECT * FROM clients ";
    echo $sql;
    //get the query result
    $result = mysqli_query($conn, $sql);


    // fetch result in array format
    $car = mysqli_fetch_assoc($result);

    $car_id = $car['id'];
    $desc= '';
    $errors = array('desc'=>'');
if (isset($_POST['send'])){
    $desc= mysqli_real_escape_string($conn, $_POST['desc']);
    $conn = mysqli_connect("localhost", "images", "images", "images");


    if (array_filter($errors)) {
        //  echo "error in the form";

    } else {
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $reported_person = $_POST["reported_id"];
        $sql = "INSERT INTO reports(descriptions,from_id,to_id) VALUES ('$desc','$User2','$reported_person')";
        //create sql
        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
//            echo "{\"success\":true}";
//            exit(0);
            header("location: successfull.php");
//            echo  ("<script>alert('succesfully sent to the admin...')</script>");

        } else {
            // echo "query error" . mysqli_error($db);
            echo "{\"success\":false}";
            exit(0);

        }
    }
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
                    <h4 class='text-right'>Reporting</h4>
                </div>


                <form action='report.php'  method='post'>

                    <div style='float right' style='border-radius:200px'>
                        <img style='width:200px;height:200px:border-radius:200px' src='<?php echo ($a1['image']) ?>'></div>



                    <div class='row mt-2'>
                        <div class='col-md-6'><label class='labels'>First Name</label>
                            <p><?php echo htmlspecialchars($a1['first_name']); ?></p></div>

                        <div class=col-md-6><label class=labels>Second Name</label>
                            <p><?php echo htmlspecialchars($a1['second_name']); ?></p></div>
                        <div class=col-md-6><label class=labels>Username</label>
                            <p><?php echo htmlspecialchars($a1['username']); ?></p></div>
                        <div class=col-md-6><label class=labels>ID No.</label>
                            <p><?php echo htmlspecialchars($a1['id_no']); ?></p></div>
                        <div class=col-md-6><label class=labels>Phone No.</label>
                            <p><?php echo htmlspecialchars($a1['phone']); ?></p></div>

                    </div>

                    <div>
                        <input type="text" name="desc" placeholder="write your complain here" style="width: 500px;height: 200px">
                        <input type=hidden name=id value='<?php echo htmlspecialchars($a1['id']); ?>'>
                        <input type="hidden" value="<?php if(isset($client_id))echo $client_id;?>" name="reported_id">
                        <div class=mt-5 text-center ><button name=send class=btn btn-primary profile-button type=submit>Send</button></div>

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