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
        <form action="control.php" method="POST">
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
                    <label for="password">Password</label>
                </td>
                <td>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required />
                </td>
            </tr>
            <tr>
                <td class="btn-td" colspan="2">

                    <input type="submit" name="signin" value="Sign In" />
                </td>
            </tr>
        </form>
        <tr>
            <td colspan="2">
                <a href="register.php" class="text-info text-decoration-none">Create New Account</a>
            </td>
        </tr>
    </table>

</body>

</html>