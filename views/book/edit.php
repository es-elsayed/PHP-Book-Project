<!DOCTYPE html>
<html lang="en">
<?php
// DataBase connection
require_once("./DB.php");
if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
    $conn = new DB();
    $con = $conn->getConnection();

    $res = $con->query("select * from book where id='{$_REQUEST['id']}'");
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
                            <label class="form-label" for="title">Title</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title of Book" value="<?php echo $row['title']; ?>" required />
                        </td>
                    </tr>
                    <!-- ************************************* -->
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
                            <label class="form-label" for="details">Details</label>
                        </td>
                        <td>
                            <textarea name="details" id="details" class="form-control" placeholder="Details of Book"><?php echo $row['details']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="img">Cover Photo</label>
                        </td>
                        <td>
                            <input type="file" class='form-control' name="img" id="img">
                        </td>
                    </tr>
                    <tr>
                        <td class="btn-td" colspan="2">
                            <input type="submit" class="btn-primary" name="edit" value="EDIT" />
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</body>

</html>