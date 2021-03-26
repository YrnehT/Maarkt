<!-- ROOM PAGE, handles each chat room between users on the website -->

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
}
// Create connection
$mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$user_id = $_SESSION['login']['id'];
$sql = mysqli_query($mysqli, "SELECT * FROM room WHERE `status` != '0' AND  `sender_id` = '$user_id' OR `receiver_id` = '$user_id' ORDER BY `updated_at` DESC");
$list_room = array();
while ($row = mysqli_fetch_assoc($sql)) {
    $list_room[] = $row;
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
                <h1>Messages</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <ul class="list-group">
                    <!-- display messages in chat room -->
                    <?php
                    foreach ($list_room as $item) {
                        $sql = mysqli_query($mysqli, "SELECT * FROM `message` WHERE `room_id` = '{$item['id']}' ORDER BY `created_at` DESC");
                        $last = mysqli_fetch_assoc($sql);
                        $id = ($item['sender_id'] == $_SESSION['login']['id']) ? $item['receiver_id'] : $item['sender_id'];
                        $sql = mysqli_query($mysqli, "SELECT * FROM user WHERE `id` = '$id' AND `status` = '1'");
                        $chat = mysqli_fetch_assoc($sql);
                    ?>
                        <a class="list-group-item" href="chat.php?id=<?= (($item['sender_id'] == $_SESSION['login']['id']) ? $item['receiver_id'] : $item['sender_id']) ?>">
                            <ul>
                                <li class="float-left">
                                    <img class="img-circle" src="https://icon-library.com/images/person-image-icon/person-image-icon-6.jpg" width="70px" />
                                </li>
                                <li class="float-left pl-3">
                                    <h4><?= $chat['fullname'] ?></h4>
                                    <small><i><?= $last['message'] ?></i></small>
                                </li>
                            </ul>
                        </a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </main>

</body>

</html>