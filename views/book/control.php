<?php
require_once("./DB.php");
require_once("./user.php");
require_once("./Book.php");
$conn = new DB();
$con = $conn->getConnection();
//  Signin Controller
if ($_POST['signin'] === "Sign In") {
    $result = $con->query("select * from user where name='{$_POST['name']}'");
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if ($_POST['name'] == $res['name'] && $_POST['password'] == $res['password']) {
        try {
            setcookie("name", $_POST['name']);
            setcookie("id", $res['id']);
            setcookie("password", $_POST['password']);
        } catch (Throwable $th) {
            var_dump($th);
            session_start();
            $_SESSION["id"] = $_POST['id'];
            $_SESSION["name"] = $_POST['name'];
            $_SESSION["password"] = $_POST['password'];
        }
        header('location:list.php');
    } else {
        header('location:login.php');
    }
}
//  Register Controller
else if ($_POST['signup'] == 'Sign Up') {
    $user = new user();
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->description = $_POST['description'];
    $user->password = $_POST['password'];
    if ($_POST['password'] == $_POST['con-password'] & Validation_Img($_FILES['img']) == true) {
        $con = $conn->insertData("user", "
        name='{$user->name}',
        email='{$user->email}',
        description='{$user->description}',
        password='{$user->password}',
        photo='./UP/{$_FILES['img']['name']}'
        ");
        header('Location:index.php');
    }
}
// add new Book
else if ($_POST['add'] === "Save") {
    $book = new book();
    $book->title = $_POST['title'];
    $book->description = $_POST['description'];
    $book->details = $_POST['details'];
    $book->creator_id = $_COOKIE['id'];
    if (Validation_Img($_FILES['img']) == true) {
        $con = $conn->insertData("book", "
        title='{$book->title}',
        description='{$book->description}',
        details='{$book->details}',
        creator_id='{$book->creator_id}',
        photo='./UP/{$_FILES['img']['name']}'
        ");
        header("location:list.php");
    }
} else if ($_GET['del'] === "Delete") {
    $con = $conn->deleteData('book', "id={$_REQUEST['id']}");
    header("location:profile.php");
} else if ($_POST['edit'] === "EDIT") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $id = $_REQUEST['id'];
    if (Validation_Img($_FILES['img']) == true) {
        $con = $conn->updateData("book", "
                        title='$title',
                        description='$description',
                        details='$details',
                        photo='./UP/{$_FILES['img']['name']}'
                            ", "id='$id'");
        header('location:profile.php');
    } else {
        header('location:edit.php');
    }
} else if ($_POST['useredit'] === "EDIT") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $description = $_POST['description'];
    $id = $_REQUEST['id'];
    if (Validation_Img($_FILES['img']) == true) {
        $con = $conn->updateData("user", "
                        name='$name',
                        email='$email',
                        description='$description',
                        password='$password',
                        photo='./UP/{$_FILES['img']['name']}'
                            ", "id='$id'");
        header('location:profile.php');
    } else {
        header('location:edit.php');
    }
} else {
    setcookie("id", "", time() - 3600);
    setcookie("name", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    header('location:index.php');
}
function Validation_Img($img)
{
    $validImgArr = ['png', 'jpg', 'jpeg'];
    $extention = pathinfo($img['name'], PATHINFO_EXTENSION);
    if (in_array($extention, $validImgArr)) {
        return move_uploaded_file($img['tmp_name'], "./UP/" . $img['name']);
    } else {
        echo "Enter Valid Image 'png,jpg,jpeg'";
        header("location:add.php");
    }
}
