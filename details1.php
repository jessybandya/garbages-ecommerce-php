<?php
include('config.php');

if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql ="DELETE FROM products WHERE id = $id_to_delete";
    if(mysqli_query($conn, $sql)){
        //success
        header('Location: add.php');
    }else{
        //failure
        echo 'query error: ' . mysqli_error($conn);
    }
}
//check GET request id param
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //make sql
    $sql = "SELECT * FROM products WHERE id = $id";
    //get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $car = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>
<!DOCTYPE html>
<?php include('templates/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/details.css">
<html>
<div  class="container">
    <div class="my_card">
        <?php $image_src = $car['image'];



        ?>
        <?php if($car): ?>

        <!--       <img  style="border-radius: 20px" src="<?php echo  $image_src; ?>">
 -->






        <div class='card border-0'>
            <img  class='card-img-top img-fluid  border-0' style='object-fit: cover;border-radius: 20px' src="<?php echo  $image_src; ?>" alt='Card image' >
            <div class="bd - format ">
            </div>

            <div class='card  text-xs-center border-light'>


                <p class='card-text'>
                <p><h4><b>Name: <?php echo htmlspecialchars($car['name']); ?></b></h4></p>
                <p><h4><b>Weight: Kg <?php echo htmlspecialchars($car['weight']); ?></b></h4>
                <p><h4><b>Category: <?php echo htmlspecialchars($car['category']); ?></b></h4>
                <p><h4><b>Price: Ksh <?php echo htmlspecialchars($car['price']); ?></b></h4>
                <p><h4><b>Posted on: <?php echo htmlspecialchars($car['created_at']); ?></b></h4>


                </p>
                <div class="bd-format" >
                    <a href="edit.php?id=<?php echo $car['id']?>">
                        <button type="button" class="btn btn-secondary" style="margin-left: 0px;background-color: orange;border-radius: 20px;color: white;width: 250px;height: 50px">Edit</button>
                    </a>
                    <a href="request.php?id=<?php echo $car['id']?>">
                    </a>
                </div>



            </div>


            <!-- DELETE FORM -->
            <form  method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $car['id'] ?>">
                <button style="margin-left: 20px;background-color: orange;border-radius: 20px;color: white;width: 250px;height: 50px" type="submit" class="bd-format"  name="delete" value="Delete" class="btn brand z-depth-0" class="btn btn-secondary">DELETE</button>


                   <!--       <button type="button" class="btn btn-secondary" style="margin-left: 0px;background-color: black;border-radius: 20px">Request Invoice</button>
                 -->     </form>
            <?php else: ?>
                <h5>No such car exist</h5>
            <?php endif; ?>

            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/search.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap-4.4.1.js"></script>
        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</html>