<?php
session_start();
require("config.php");
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //make sql
    $q = "SELECT * FROM products WHERE id= $id";
    $r = mysqli_query($conn, $q);
    $a = mysqli_fetch_assoc($r);
    $User = $_SESSION['username'];
    $User1 = $_SESSION['id'];

}

if (isset($_POST['save'])) {
    $errors = array();
    $image = $_FILES['file']['name']; // too bad. Save images to a folder and save the url to the image in the db
    if (strlen($image) > 0) {
        $file = $_FILES['file'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename(sha1(date("l jS \of F Y h:i:s A u e")) . $_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    extract($_POST);
    $sql = "UPDATE products SET ";
    $original_query_len = strlen($sql);
    // Addition of columns only when the user has decided to edit that col
    if (strlen($name) > 0) {
        $sql .= "name= '$name'";
    }

    if (strlen($category) > 0) {
        if (strlen($name) > 0) {
            $sql .= ",";
        }
        $sql .= "category ='$category'";
    }

    if (strlen($weight) > 0) {
        if (strlen($category . $name) > 0) {
            $sql .= ",";
        }
        $sql .= "weight =$weight";
    }

    if (strlen($price) > 0) {
        if (strlen($weight . $category . $name) > 0) {
            $sql .= ",";
        }
        $sql .= "price =$price";
    }

    if (strlen($image) > 0) {
        if (strlen($price . $category . $name . $weight) > 0) {
            $sql .= ",";
        }
        $sql .= "image ='$target_file'";
    }
    if ($original_query_len != strlen($sql)) {
        $sql .= " where id=$id";
        if (mysqli_query($conn, $sql)) {
            header("location: details1.php?id=$id");
        } else {
            echo "Not Updated";
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
                    <h4 class='text-right'>garbage Editting</h4>
                </div>


                <form action='edit.php' method='post' enctype="multipart/form-data">

                    <div style='float right' style='border-radius:200px'>
                        <img style='width:200px;height:200px:border-radius:200px' src='<?php echo($a['image']) ?>'>
                    </div>


                    <div class='row mt-2'>
                        <div class='col-md-6'><label class='labels'>Name</label>
                            <input type='text' name='name' class='form-control'
                                   value='<?php echo htmlspecialchars($a['name']); ?>'></div>

                        <div class=col-md-6><label class=labels>Weight</label>
                            <input type=text class=form-control name=weight
                                   value='<?php echo htmlspecialchars($a['weight']); ?>'></div>
                        <div class=col-md-6><label class=labels>Category</label>
                            <input type=text class=form-control name=category
                                   value='<?php echo htmlspecialchars($a['category']); ?>'></div>
                        <div class=col-md-6><label class=labels>Price</label>
                            <input type=text class=form-control name=price
                                   value='<?php echo htmlspecialchars($a['price']); ?>'></div>

                    </div>

                    <div>
                        <input type=hidden name=id value='<?php echo htmlspecialchars($a['id']); ?>'>
                        <div style='margin-top:20px' class=col-md-6><label class=labels>Change/Add Photo</label><input
                                    class=file btn form-control type='file' name='file'></div>
                        <div class=mt-5 text-center>
                            <button name=save class=btn btn-primary profile-button type=submit>Save</button>
                        </div>

                </form>


            </div>
        </div>
    </div>
</div>
<?php include('templates/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>
</body>
</html>