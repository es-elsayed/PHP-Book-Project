<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
    require_once("./DB.php");
    $conn = new DB();
    $con = $conn->getConnection();
    ?>
    <table>
        <form action="control.php" method="POST" enctype="multipart/form-data">
            <tr>
                <td>
                    <label for="name">User Name </label>
                </td>
                <td>
                    <input type="text" name="name" id="name" placeholder="User Name" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email </label>
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="Email" required />
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
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="con-password">Confirm Password</label>
                </td>
                <td>
                    <input type="password" name="con-password" id="con-password" placeholder="Re-enter Password" required />
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-label" for="img">Photo</label>
                </td>
                <td>
                    <input type="file" class='form-control' name="img" id="img">
                </td>
            </tr>
            <tr>
                <td class="btn-td" colspan="2">

                    <input type="submit" name="signup" value="Sign Up" />
                </td>
            </tr>
        </form>
        <tr>
            <td colspan="2">
                Already have Account: <a href="index.php" class="text-info">login</a>
            </td>
        </tr>
    </table>

</body>

</html>