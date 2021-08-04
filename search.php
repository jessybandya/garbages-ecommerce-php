<?php
include_once "config.php";

if(isset($_GET['query'])){
    $USER_HAS_SEARCHED = true;
    $query = mysqli_real_escape_string($conn, $_GET['query']);
    $sql = "SELECT * FROM products where name LIKE'%$query%' OR category LIKE '%$query%'";
    $res = mysqli_query($conn, $sql);

    $arr = mysqli_fetch_all($res, 3);
    mysqli_free_result($res);


}





?>