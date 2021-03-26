<!-- INDEX PAGE, this page contains a splash page with a little desription of our website, buttons for the different department pages we have, as well as some of the websites most recently added posts -->

<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Term Project</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
      <a class="navbar-brand mb-0 h1" href="index.php">Maarkt</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Departments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="departments/allitems.php">All Items</a>
              <a class="dropdown-item" href="departments/automotive.php">Automotive</a>
              <a class="dropdown-item" href="departments/books.php">Books</a>
              <a class="dropdown-item" href="departments/clothing.php">Clothing</a>
              <a class="dropdown-item" href="departments/electronics.php">Electronics</a>
              <a class="dropdown-item" href="departments/furniture.php">Furniture</a>
              <a class="dropdown-item" href="departments/music.php">Music</a>
              <a class="dropdown-item" href="departments/sportsoutdoors.php">Sports & Outdoors</a>
              <a class="dropdown-item" href="departments/videogames.php">Video Games</a>
              <a class="dropdown-item" href="departments/other.php">Other</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Search
            </a>
            <div id="searchbardropdown" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <form action="search.php" method="POST" class="form-inline flex-nowrap">
                <input id="navsearch" class="form-control mr-sm-2 ml-sm-5" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link " href="#"><button id="createPostBtn" data-login="<?= ((isset($_SESSION['login'])) ? '#' : 'auth/login.php') ?>" class="btn btn-outline-info my-2 my-sm-0" type="button">Create Post</button></a>
          </li>
		  <!-- If a user is logged in, change the navbar accordingly -->
          <?php if (isset($_SESSION['login'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="auth/logout.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth/profile.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">My Account</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="chat/room.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Chat</button></a>
            </li>
		  <!-- Otherwise use the normal navbar -->
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="auth/signup.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="auth/login.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>

    <?php include 'navbar/createpostmodal.php' ?>
  </header>

  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1>Welcome to Maarkt!</h1>
        <p class="lead text-muted">Maarkt is an online used item marketplace where users can buy and sell hundreds of different types of items within the GTA.</p>
        <p class="lead text-muted">Click on one the departments below to get started.</p>
      </div>
      <div class="container text-center">
        <h2>Departments</h2>
        <a href="departments/allitems.php"> <button type="button" class="btn btn-info">All Items</button> </a>
        <a href="departments/automotive.php"> <button type="button" class="btn btn-info">Automotive</button> </a>
        <a href="departments/books.php"> <button type="button" class="btn btn-info">Books</button> </a>
        <a href="departments/clothing.php"> <button type="button" class="btn btn-info">Clothing</button> </a>
        <a href="departments/electronics.php"> <button type="button" class="btn btn-info">Electronics</button> </a>
        <a href="departments/furniture.php"> <button type="button" class="btn btn-info">Furniture</button> </a>
        <a href="departments/music.php"> <button type="button" class="btn btn-info">Music</button> </a>
        <a href="departments/sportsoutdoors.php"> <button type="button" class="btn btn-info">Sports & Outdoors</button> </a>
        <a href="departments/videogames.php"> <button type="button" class="btn btn-info">Video Games</button> </a>
        <a href="departments/other.php"> <button type="button" class="btn btn-info">Other</button> </a>
      </div>
    </section>

    <div class="album py-5 bg-light">
          <div id="recentlyadded"><h1>Recently Added Items</h1></div> 
          <br>
          
  <div class="container">
	<div class="row">
          <?php
          // Create connection
          $mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
          // Check connection
          if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
          }

		  // Get all the posts from mySQL database
          $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 0,6";
          $result = $mysqli->query($sql);

          if ($result->num_rows > 0) {
			// Main content of the page
            // Output data (all the posts) of each row
            while ($row = $result->fetch_assoc()) {
              echo '<div class="col-md-4">';
              echo '<div class="card mb-4 shadow-sm">';
              echo '<a href="posts/postDetail.php?idPost=' . $row["id"] . '"><img class="card-img-top" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="images/' . $row['image'] . '"><rect width="100%" height="100%" fill="#55595c"/></a>';
              echo '<div class="card-body">';
              echo '<a href="posts/postDetail.php?idPost=' . $row["id"] . '"><h5 class="card-title">' . $row["itemName"] . '</h5> </a>';
              echo '<p class="card-text">' . $row["description"] . '</p>';
              echo '<ul class="list-group list-group-flush">';
              echo '<li class="list-group-item">Price: $' . $row["price"] . '</li>';
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
              echo '<a href="chat/chat.php?id=' . $row['user_id'] . '"><button type="button" class="btn btn-sm btn-info">Chat now</button></a>';
              echo '</div>';
              echo '<div class="card-footer">';
              echo '<small class="text-muted">Date Posted: 11-20-2020</small>';
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


</body>

</html>