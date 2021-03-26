<!-- CHAT PAGE, handles the messagws between users on our website -->

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
// connect sender and receiver
$sender_id = $_SESSION['login']['id'];
$receiver_id = $_GET['id'];
$sql = mysqli_query($mysqli, "SELECT * FROM room WHERE (`sender_id` = $sender_id AND `receiver_id` = $receiver_id) OR  (`sender_id` = $receiver_id AND `receiver_id` = $sender_id)");
if (mysqli_num_rows($sql) == 0) {
    mysqli_query($mysqli, "INSERT INTO room (sender_id, receiver_id, updated_at) VALUES ($sender_id, $receiver_id, NOW())");
    header("Refresh:0");
}
$room_chat = mysqli_fetch_assoc($sql);

// list chat messages by time
$sql = mysqli_query($mysqli, "SELECT * FROM `message` WHERE `room_id` = '{$room_chat['id']}' ORDER BY `created_at`");
$list_message = array();
while($row = mysqli_fetch_assoc($sql)) {
    $list_message[] = $row;
}
$uid = ($room_chat['sender_id'] == $sender_id) ? $room_chat['receiver_id'] : $room_chat['sender_id'];
$sql = mysqli_query($mysqli, "SELECT * FROM user WHERE `id` = '$uid' AND `status` = '1'");
$chat = mysqli_fetch_assoc($sql);

// update new message to chat room
if (isset($_POST['msg'])) {
    mysqli_query($mysqli, "INSERT INTO `message` (room_id,message,sender_id,created_at) VALUES ({$room_chat['id']}, '{$_POST['msg']}', {$sender_id}, NOW())");
    mysqli_query($mysqli, "UPDATE `room` SET `updated_at` = NOW() WHERE `id` = {$room_chat['id']}");
    exit();
}
// reload function
if (isset($_POST['reload'])) {
    foreach ($list_message as $item) {
        if ($item['sender_id'] != $sender_id) { ?>
        <!-- type chat box -->
            <div class="incoming_msg">
                <div class="incoming_msg_img"><img src="https://icon-library.com/images/person-image-icon/person-image-icon-6.jpg" alt=""></div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <p><?= $item['message'] ?></p>
                        <span class="time_date"><?= $item['created_at'] ?></span>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p><?= $item['message'] ?></p>
                    <span class="time_date"><?= $item['created_at'] ?></span>
                </div>
            </div>
<?php
        }
    }
    exit();
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
                <h1>Message <?=$chat['username']?></h1>
            </div>
        </section>
        <!-- write message and send -->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="mesgs">
                    <div class="msg_history"></div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button">Send</button>
                        </div>
                    </div>
                    <script>
                        // reload to update newest messages
                        reloadMsg();
                        $(".msg_send_btn").click(function() {
                            $.post(document.location.href, {
                                'msg': $(".write_msg").val()
                            }, function() {
                                reloadMsg();
                                $(".write_msg").val("");
                            })
                        });

                        setInterval(reloadMsg, 5000);
                        // see chat history
                        function reloadMsg() {
                            $(".msg_history").html("");
                            $.post(document.location.href, {
                                'reload': 1
                            }, function(data) {
                                $(".msg_history").html(data);
                                $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
                            })
                        }
                    </script>
                </div>
            </div>
        </div>
    </main>

</body>

</html>