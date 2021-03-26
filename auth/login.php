<!-- LOGIN page for our wesbite, checks the username and password fields to see if the user exists in the database -->

<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
// Create connection
$mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Ask for client's username and password to log in
if (isset($_POST['LOGIN'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE `status` = '1' AND `username` = '$username'");

    // send to main page if log in sucessfully   
    if (mysqli_num_rows($sql)) {
        $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$username' AND `password` = '$password' AND `status` = '1'");
        if (mysqli_num_rows($sql)) {
            $user = mysqli_fetch_assoc($sql);
            $_SESSION['login'] = $user;
            $_SESSION['userId'] = $user['id'];
            header("Location: ../index.php");
        } 
        // wrong password error
        else {
            $error = '* Password is incorrect';
        }
    } 
    // wrong username error
    else {
        $error = '* Username not found';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- display the navigation bar -->
    <?php include '../navbar/head.php'; ?>
</head>

<body>
    <header>
        <?php include '../navbar/header.php'; ?>
        <?php include '../navbar/createpostmodal.php'; ?>
    </header>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1>Login</h1>
            </div>
        </section>

        <!-- log in form -->
        <div class="album py-5 bg-light">
            <form action="" method="post">
                <div class="container">
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="title">Username:</label>
                        <input type="text" class="form-control" id="userName" name="username">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="setprice">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <button type="submit" name="LOGIN" class="btn btn-info">Login</button>
                    </div>
                    <?= (isset($error) ? $error : '') ?>
                </div>
            </form>
        </div>
    </main>

</body>

</html>