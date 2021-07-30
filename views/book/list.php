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
            include('../layout/nav.php');
            require_once("./DB.php");

            if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
                $conn = new DB();
                $con = $conn->getConnection();
                // Select from DB
                $list = $con->query("select * from book");
                $res = $list->fetchAll(PDO::FETCH_ASSOC);
                echo "
                <div calss='container'>
                <div class='row'>";
                foreach ($res as $result) {

                    echo "
                <div class='col-lg-4 card'>
                <img src='{$result['photo']}' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>{$result['title']}</h5>
                    <p class='card-text'>{$result['description']}</p>
                    <a href='view.php?id={$result['id']}' class='btn btn-primary'>Read More</a>
                </div>
                </div> 
                        ";
                }
                echo "</div>
                </div>
                ";
            } else {
                header("location:login.php");
            }
            ?>
        </div>
    </div>

</body>

</html>