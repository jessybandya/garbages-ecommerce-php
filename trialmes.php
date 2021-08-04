<?php
include('config.php');
session_start();
//var_dump($_SESSION);
$User2 = $_SESSION['id'];
$User = $_SESSION['username'];

require("config.php");
//$q = "SELECT * FROM clients as a INNER JOIN  chats as b  ON a.id= b.from_id AND a.id= b.to_id WHERE a.id=$_GET[id]";
//$r = mysqli_query($conn,$q);
//$a1 = mysqli_fetch_assoc($r);

$msg = "";
$text = '';
$errors = array('text' => '');
// If upload button is clicked ...
// When a POST is sent , $_GET womt work
if(isset($_GET['id']))
    extract($_GET);

if (isset($_POST['send'])) {


    include('config.php');

    var_dump($_POST);
    $id = mysqli_real_escape_string($conn, $_POST['send_to']);
    //make sql
    echo $User2."Sent ".$_POST['text']." to ".$id;
    $sql = "SELECT * FROM clients WHERE id = $id";
    //get the query result
    $result = mysqli_query($conn, $sql);


    // fetch result in array format
    $car = mysqli_fetch_assoc($result);
    $car_id = $car['id'];


    $conn = mysqli_connect("localhost", "images", "images", "images");


    if (array_filter($errors)) {
        //  echo "error in the form";
    } else {
        $text = mysqli_real_escape_string($conn, $_POST['text']);


        //create sql
        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
            echo "{\"success\":true}";
            exit(0);

        } else {
            // echo "query error" . mysqli_error($db);
            echo "{\"success\":false}";
            exit(0);

        }

        // Get all the submitted data from the form
        $sql = "INSERT INTO chats(messages,from_id,to_id) VALUES ('$text','$User2','$car_id')";

        // Execute query
        mysqli_query($conn, $sql);


    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<header>

</header>
<main>
    <section>
        <form action="trialmes.php" method="post" id ='typemsg'>
            <input type="text" name="text" required>
            <?php if (isset($id)) { ?>
                <input type="hidden" name="send_to" value="<?php echo $id;?>">
            <?php  } ?>
            <p class="err text-danger"></p>
            <button type="submit" name="send">Send</button>
        </form>
    </section>
</main>
</body>

</html>