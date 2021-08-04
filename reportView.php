<?php
session_start();

require("config.php");

if(!isset($_GET['id'])) {
    echo "Forbidden";
    exit(-1);
}

$reporting_client = $_GET['id'];
$report_detail_sql = "SELECT * FROM clients as a INNER JOIN  reports as b  ON a.id= b.from_id where b.from_id = $reporting_client";
$r = mysqli_query($conn,$report_detail_sql);
$report_detail_obj = mysqli_fetch_assoc($r);

$reported_client = $report_detail_obj['to_id'];

$reported_client_sql = "SELECT * FROM clients as a INNER JOIN  reports as b  ON a.id= b.to_id where b.to_id = $reported_client;";
$r2 = mysqli_query($conn,$reported_client_sql);
$reported_client_obj = mysqli_fetch_assoc($r2);

$q3 = "SELECT * FROM reports ";
$r3 = mysqli_query($conn,$q3);
$a3 = mysqli_fetch_assoc($r3);

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/profileview.css">
</head>
<body>
<?php include('templates/headerA.php'); ?>

<div style="flex-direction: column">
<!--Kiac-->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img style="height: 100px;width: 100px;border-radius: 200px" src="<?php echo ($report_detail_obj['image']); ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600"><p>Username</p></h6>
                                <p><?php echo htmlspecialchars($reported_client_obj['username']); ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information About the Reporter</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">First Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['first_name']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Second Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['second_name']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['email']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['phone']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">ID No.</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['id_no']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Opened Since</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($report_detail_obj['created_at']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Complaint</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($a3['descriptions']); ?></p></h6>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img style="height: 100px;width: 100px;border-radius: 200px" src="<?php echo ($reported_client_obj['image']); ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600"><p>Username</p></h6>
                                <p><?php echo htmlspecialchars($reported_client_obj['username']); ?></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information about Reported client</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">First Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['first_name']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Second Name</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['second_name']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['email']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['phone']); ?></p></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">ID No.</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['id_no']); ?></p></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Opened Since</p>
                                        <h6 class="text-muted f-w-400"><p><?php echo htmlspecialchars($reported_client_obj['created_at']); ?></p></h6>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php include('templates/footerA.php'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>

<?php
$update_sql ="UPDATE reports SET seen = 1 where reports.id = $report_detail_obj[id] ";
mysqli_query($conn, $update_sql);
?>