<!DOCTYPE html>
<html lang="en">
<?php
// DataBase connection
require_once("./DB.php");
if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
    $conn = new DB();
    $con = $conn->getConnection();

    $res = $con->query("select * from user where id='{$_REQUEST['id']}'");
    $row = $res->fetch(PDO::FETCH_ASSOC);
} else {
    header("location:login.php");
}
include('../layout/head.php');
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php
        include('../layout/sidebar.php');
        // var_dump($row);
        ?>
        <div id="page-content-wrapper">
            <?php
            include('../layout/nav.php');
            ?>
            <table class='table add-table'>
                <form action="control.php" method="POST" enctype="multipart/form-data">
                    <input type="text" class="form-control" hidden name="id" value="<?php echo $row['id']; ?>"><br>
                    <tr>
                        <td>
                            <label class="form-label" for="name">Name: </label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Enter Your Name" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class=" form-label" for="email">E-mail</label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your E-mail" value="<?php echo $row['email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="details">Password</label>
                        </td>
                        <td>
                            <input type="password" name="details" id="details" class="form-control" placeholder="Write a password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="description">Description</label>
                        </td>
                        <td>
                            <textarea name="description" id="description" class="form-control" placeholder="Description of Book"><?php echo $row['description']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="img">Cover Photo</label>
                        </td>
                        <td>
                            <input type="file" class='form-control' value="<?php echo $row['photo']; ?>" name="img" id="img">
                        </td>
                    </tr>
                    <tr>
                        <td class="btn-td" colspan="2">
                            <input type="submit" class="btn-primary" name="useredit" value="EDIT" />
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</body>

</html>