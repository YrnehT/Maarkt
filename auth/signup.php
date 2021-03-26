<!-- SIGN UP PAGE, allows new users to make accounts on our website -->

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
//check the database if a username already exists
if (isset($_POST['REGISTER'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $error = '';
    $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE `status` = '1' AND `username` = '$username'");
    if (mysqli_num_rows($sql)) {
        $error = 'Username has already exists';
    }
    //if username does not exist, insert account details into the user database
    if ($error == '') {
        $data = array(
            'username' => $username,
            'fullname' => $_POST['fullname'],
            'password' => $password,
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'image' => 'person.png',
            'access' => 0,
            'status' => 1,
        );
        $strf = '';
        $strv = '';
        foreach ($data as $k => $v) {
            $strf .= $k . ', ';
            $strv .= "'" . $v . "',";
        }
        $strf = rtrim(rtrim($strf), ',');
        $strv = rtrim(rtrim($strv), ',');
        mysqli_query($mysqli, "INSERT INTO user ($strf) VALUES ($strv)");
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html>

<head>
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
                <h1>Signup</h1>
            </div>
        </section>

        <!-- sign up form -->
        <div class="album py-5 bg-light">
            <form action="" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mr-auto ml-auto">
                                <label for="title">Username:</label>
                                <input type="text" class="form-control" id="userName" name="username">
                            </div>
                            <div class="form-group mr-auto ml-auto">
                                <label for="setprice">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group mr-auto ml-auto">
                                <label for="title">Fullname:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                        </div>
                        <div class="form-group col-md-6 mr-auto ml-auto">
                            <div class="form-group mr-auto ml-auto">
                                <label for="title">Email:</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mr-auto ml-auto">
                                <label for="title">Address:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="form-group mr-auto ml-auto">
                                <label for="title">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" name="REGISTER" class="btn btn-info">Signup</button>
                    </div>
                    <?= (isset($error) ? $error : '') ?>
                </div>
            </form>
        </div>
    </main>

</body>

</html>