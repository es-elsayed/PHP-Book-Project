<!DOCTYPE html>
<html lang="en">
<?php
include('../layout/head.php');
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        include('../layout/sidebar.php');
        ?>
        <div id="page-content-wrapper">
            <?php

            require_once('./DB.php');
            if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
                $conn = new DB();
                $con = $conn->getAllData('book', "id={$_REQUEST['id']}");
                $row = $con->fetch(PDO::FETCH_ASSOC);
                $ucon = $conn->getAllData('user', "id={$row['creator_id']}");
                $urow = $ucon->fetch(PDO::FETCH_ASSOC);
            } else {
                header("location:login.php");
            }

            // var_dump($_REQUEST);
            echo "
            <img class='card-img-top' src='{$row['photo']}'>
            <br>
                    <span class='fs-1 fw-bolder'>Title: </span>
                    <span class='fs-2 text-info'>{$row['title']}</span><br>
                    <span class='fs-1 fw-bolder'>Author: </span>
                    <span class='fs-2 text-info'>{$urow['name']}</span><br>
                    <span class='fs-1 fw-bolder'>Description: </span>
                    <span class='fs-2 text-info'>{$row['description']}</span><br>
                    <p class='fs-1 fw-bolder text-center'>Details </p>
                    <p>{$row['details']}</p>
            ";
            ?>
        </div>
    </div>
</body>

</html>