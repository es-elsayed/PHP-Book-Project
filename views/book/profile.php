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
                $list = $conn->getAllData("book", "creator_id={$_COOKIE['id']}");
                $res = $list->fetchAll(PDO::FETCH_ASSOC);
                $user = $conn->getAllData("user", "id={$_COOKIE['id']}");
                $ures = $user->fetch(PDO::FETCH_ASSOC);
                echo "
                <div calss='container'>
                    <div class='row'>
                        <div class='col card-body'>
                            <img src='{$ures['photo']}' width='100px' height='100px'><br>
                            <span class='fs-2 fw-bolder'>ID: </span>
                            <span class='fs-2 text-info'>{$ures['id']}</span><br>
                            <span class='fs-2 fw-bolder'>Name: </span>
                            <span class='fs-2 text-info'>{$ures['name']}</span><br>
                            <span class='fs-1 fw-bolder'>E-mail: </span>
                            <span class='fs-2 text-info'> {$ures['email']}</span><br>
                            <span class='fs-1 fw-bolder'>Description: </span>
                            <span class='fs-2 text-info'> {$ures['description']}</span><br>
                        </div>
                    </div>
                </div>
                <a href='useredit.php?id={$ures['id']}' class='text-secondary text-decoration-none'>Edit Profile</a>
                ";

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
                    <a href='edit.php?id={$result['id']}' class='btn btn-warning'>Edit</a>
                    <a onClick=\"javascript: return confirm('Are U Sure to Delete');\" href='control.php?id={$result['id']}&del=Delete' class='btn btn-danger' >Delete</a>
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