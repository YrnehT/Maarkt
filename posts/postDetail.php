<!-- POST DETAIL CODE, this code determines the page layout of a specific post's information  -->


<?php
session_start();
// Create connection
$mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['idPost'])) {
    $idd = $_GET['idPost'];
    $findPost =  mysqli_query($mysqli, "SELECT * FROM posts WHERE id='$idd'  ");
    $row = mysqli_fetch_assoc($findPost);
} else if (!$_GET['idPost'] || $_GET['idPost'] == null) {
    header("Location: ../index.php");
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
                <h1><?= $row["itemName"] ?></h1>
            </div>
        </section>

        <div class="album py-5 bg-light container">
            <div class="row">
                <div class="col-md-6">
                    <img class="post-detail-img" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="../images/<?= $row['image'] ?>">
                    <rect width="100%" height="100%" fill="#55595c" /></img>
                </div>
                <div class="col-md-6">
                    <h2>Post Information</h2>
                    </ul>
                    <h5 class="card-title">Contact Info</h2>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: <?= $row["userName"] ?></li>
                            <li class="list-group-item">Phone Number: <?= $row["phone"] ?></li>
                            <li class="list-group-item">Email: <?= $row["email"] ?></li>
                            <br>
                            <h5>Item Details</h5>
                            <li class="list-group-item">Condition: <?= $row["itemCondition"] ?></li>
                            <li class="list-group-item">Category: <?= $row["category"] ?></li>
                            <li class="list-group-item">Description: <?= $row["description"] ?></li>
                    
                        </ul>
                </div>
            </div>
    </main>

</body>

</html>