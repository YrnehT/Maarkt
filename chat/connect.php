<!-- Handles create post functionality, Get information from each field in the form and insert into the database -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Term Project</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navigation bar -->
  <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <!--Page Logo: send to main page if pressed -->
      <a class="navbar-brand mb-0 h1" href="../index.php">Maarkt</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

          <!-- send to main page -->
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
          </li>

           <!-- Author info -->
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>

          <!-- Dropdown menu of links send to different pages contain item in mentioned categories -->
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Departments
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="allitems.php">All Items</a>
                <a class="dropdown-item" href="automotive.php">Automotive</a>
                <a class="dropdown-item" href="books.php">Books</a>
                <a class="dropdown-item" href="clothing.php">Clothing</a>
                <a class="dropdown-item" href="electronics.php">Electronics</a>
                <a class="dropdown-item" href="furniture.php">Furniture</a>
                <a class="dropdown-item" href="music.php">Music</a>
                <a class="dropdown-item" href="sportsoutdoors.php">Sports & Outdoors</a>
                <a class="dropdown-item" href="videogames.php">Video Games</a>
              </div>
          <!-- Search for an certain item -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Search
            </a>
            <div id="searchbardropdown" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <form class="form-inline flex-nowrap">
                <input id="navsearch" class="form-control mr-sm-2 ml-sm-5" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </li>
        </ul>

        <!-- Functional Buttons -->
        <ul class="nav navbar-nav navbar-right">
          <!-- If users already logged in, a create post form would pop up. Otherwise they will be directed to the log in page -->
          <li class="nav-item">
            <a class="nav-link " href="#"><button id="createPostBtn" data-login="<?=((isset($_SESSION['login']))?'#':'../auth/login.php')?>" class="btn btn-outline-info my-2 my-sm-0" type="button">Create Post</button></a>
          </li>

          <!-- If users haven't log in, these button will appear on page-->
          <?php if(isset($_SESSION['login'])) {?>

          <li class="nav-item">
            <a class="nav-link" href="../auth/signup.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../auth/login.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button></a>
          </li>
          <?php } else {?>
            <!-- if users already logged in, they will have an option to sign out -->
          <li class="nav-item">
            <a class="nav-link" href="../auth/logout.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button></a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  
<!-- send user info + form info to dabase -->
<?php
	$userName = $_POST['userName'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$itemName = $_POST['title'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['textdes'];
	$image = 'image_' . rand(0, 99999) . '.png';
	move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);
	
	if ($category == "Other")
	{
		$itemCondition = $_POST['condition'];
	}
	if ($category == "Textbooks")
	{
		$itemCondition = $_POST['1-condition'];
	}
	if ($category == "Clothing")
	{
		$itemCondition = $_POST['3-condition'];
	}
	if ($category == "Electronics")
	{
		$itemCondition = $_POST['2-condition'];
	}
	if ($category == "Video Games")
	{
		$itemCondition = $_POST['1-condition'];
	}
	if ($category == "Sports & Outdoors")
	{
		$itemCondition = $_POST['condition'];
	}
	if ($category == "Music")
	{
		$itemCondition = $_POST['condition'];
	}
	if ($category == "Automotive")
	{
		$itemCondition = $_POST['4-condition'];
	}
	if ($category == "Furniture")
	{
		$itemCondition = $_POST['3-condition'];
	}
  
  //Connecting to database
  $mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");

  // Check for errors
  if ($mysqli->connect_error) {
    die('Connection Failed : ' . $mysqli->connect_error);

  // Insert the form info to mySQL table
  } else {
    mysqli_query($mysqli, "insert into posts(userName, user_id, phone, email, itemName, price, image, category, description, itemCondition)
		values('$userName', {$_SESSION['login']['id']}, '$phone', '$email', '$itemName', $price, '$image', '$category', '$description', '$itemCondition')");
    echo "<br><br><br><br><br><br><br><br><br>";
    echo '<h1 style="text-align:center;">Your post was successfully created!</h1>';
    echo $mysqli->error;
    $mysqli->close();
  }
?>

</body>
</html>
