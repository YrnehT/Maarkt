<!-- ACCOUNT Page for users, displays user information along with a users posts -->

<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
// Create connection
$mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
//get user account information from the db
$sql = mysqli_query($mysqli, "SELECT * FROM user WHERE id = {$_SESSION['login']['id']}");
$user = mysqli_fetch_assoc($sql);
$error = '';

// let user edit profile and upload new content to the database(db)
if (isset($_POST['EditProfile'])) {
    $id = $_SESSION['userId'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $sql = mysqli_query($mysqli, "UPDATE user SET `fullname` ='$fullname',`email`='$email',`address`='$address',`phone`='$phone' WHERE id='$id' ");

    // Find the existed content about *the user in database (*who edited his/her profile) and change the editted part 
    $findUser =  mysqli_query($mysqli, "SELECT * FROM user WHERE id='$id'  ");
    $row = mysqli_fetch_assoc($findUser);
    unset($_SESSION['login']);
    $_SESSION['login'] = $row;
    if ($sql === TRUE) {
        $error = 'Record updated successfully';
    } else {
        $error = 'Error updating record' . $mysqli->error;
    }
}
//delete posts a user has made
if (isset($_GET['delete'])) {
    $idd = $_GET['delete'];
    $sql = mysqli_query($mysqli, "DELETE FROM posts WHERE id='$idd' ");
    header("Location: ../auth/profile.php");
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
                <h1>My Account</h1>
            </div>
        </section>

    <!-- Form to update profile -->
        <div class="album py-5 bg-light">
            <form action="" method="post">
                <div class="container">
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="title">Fullname:</label>
                        <input type="text" value="<?= $user['fullname'] ?>" class="form-control" id="Fullname" name="fullname">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="title">Email:</label>
                        <input type="text" value="<?= $user['email'] ?>" class="form-control" id="Email" name="email">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="title">Address:</label>
                        <input type="text" value="<?= $user['address'] ?>" class="form-control" id="Address" name="address">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <label for="title">Phone:</label>
                        <input type="text" value="<?= $user['phone'] ?>" class="form-control" id="Phone" name="phone">
                    </div>
                    <div class="form-group col-md-6 mr-auto ml-auto">
                        <button type="submit" name="EditProfile" class="btn btn-info">Update</button>
                    </div>
                    <?= (isset($error) ? $error : '') ?>
                </div>
            </form>
        </div>

        <!-- Display the user's list of post -->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="bg-white" id="recentlyadded">
                    <h2>My Posts</h2>
                </div>
                <div class="row">
                    <?php
                    // Create connection
                    $mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
                    // Check connection
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }

                    $sql = "SELECT * FROM posts WHERE `user_id` = {$_SESSION['login']['id']} ORDER BY id DESC";
                    $result = $mysqli->query($sql);

                    //display all posts a user has made
                    if ($result->num_rows > 0) {

                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                            echo '<div class="card mb-4 shadow-sm">';
                            echo '<a href="../posts/postDetail.php?idPost=' . $row["id"] . '"><img class="card-img-top" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="../images/' . $row['image'] . '"><rect width="100%" height="100%" fill="#55595c"/></img> </a>';
                            echo '<div class="card-body">';
                            echo '<a href="../posts/postDetail.php?idPost=' . $row["id"] . '"><h5 class="card-title">' . $row["itemName"] . '</h5> </a>';
                            echo '<p class="card-text">' . $row["description"] . '</p>';
                            echo '<ul class="list-group list-group-flush">';
                            echo '<li class="list-group-item">Price: ' . $row["price"] . ' $</li>';
                            echo '<li class="list-group-item">Condition: ' . $row["itemCondition"] . '</li>';
                            echo '<li class="list-group-item">Category: ' . $row["category"] . '</li>';
                            echo '</ul>';
                            echo '<div class="card-contact-info">';
                            echo '<h5 class="card-title">Contact Info</h2>';
                            echo '<ul class="list-group list-group-flush">';
                            echo '<li class="list-group-item">Name: ' . $row["userName"] . '</li>';
                            echo '<li class="list-group-item">Phone Number: ' . $row["phone"] . '</li>';
                            echo '<li class="list-group-item">Email: ' . $row["email"] . '</li>';
                            echo '</ul>';
                            echo '</div>';
                            echo '<button type="button" class="btn btn-sm btn-outline-secondary view-contact-details">View Contact Information</button>';
                            echo '<a class="btn btn-sm btn-outline-danger ml-1 " onclick="DeletePost(' . $row["id"] . ')"> Delete</a>';

                            echo '</div>';
                            echo '<div class="card-footer">';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $mysqli->close();
                    ?>

                </div>
            </div>
        </div>
        </div>
    </main>
    
    <!-- Delete Post Form -->
    <div class="modal fade" id="comfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="title_model" class="modal-title text-blues"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger" id="bodyReTrashOrDelete"> Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <a id="confirmDelete" href="" id="btnDeleteOrRestrash" type="button" class="btn btn-sm btn-danger">Yes</a>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- javascript to confirm the deletion of the post and to support the above pop-up modal -->
    <script type="text/javascript">
        function DeletePost(id) {
            $("#confirmDelete").attr("href", "../auth/profile.php?delete=" + id);
            $("#title_model").text('Delete this post')
            $("#comfirmDelete").modal('show');
            return false;
        }
    </script>
</body>

</html>