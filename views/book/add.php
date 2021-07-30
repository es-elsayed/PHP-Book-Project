<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_COOKIE['name']) && isset($_COOKIE['password'])) {
} else {
    header("location:login.php");
}
include('../layout/head.php');
?>

<body>
    <div class="d-flex">
        <?php include('../layout/sidebar.php');
        ?>
        <div id="page-content-wrapper">
            <?php
            ?>
            <table class="table add-table">
                <form action="control.php" method="POST" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <label class="form-label" for="title">Title</label>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title of Book" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="description">Description</label>
                        </td>
                        <td>
                            <textarea name="description" id="description" class="form-control" placeholder="Description of Book"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label" for="details">Details</label>
                        </td>
                        <td>
                            <textarea name="details" id="details" class="form-control" placeholder="Details of Book"></textarea>
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

                            <input type="submit" class="btn btn-primary" name="add" value="Save" />
                        </td>
                    </tr>

                </form>
            </table>
        </div>
    </div>
</body>

</html>