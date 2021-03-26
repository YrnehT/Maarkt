<!-- ABOUT US PAGE, page that includes a description of our website as well as information about the creators of the website -->

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
            <a class="nav-link " href="#"><button id="createPostBtn" data-login="<?=((isset($_SESSION['login']))?'#':'auth/login.php')?>" class="btn btn-outline-info my-2 my-sm-0" type="button">Create Post</button></a>
          </li>
		  <!-- If a user is logged in, change the navbar accordingly -->
          <?php if(isset($_SESSION['login'])) {?>
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
          <?php } else {?>
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

<!-- Main content of the About Us page -->
  <main role="main">
      <div class="bg-light">
        <div class="container py-5">
          <div class="row h-100 align-items-center py-5">
            <div class="col-lg-6">
              <h1 class="display-4">About Us</h1>
              <p class="lead text-muted mb-0">Maarkt is an online used item marketplace where users can buy and sell hundreds of different types of items within the GTA.</p>
            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="https://previews.123rf.com/images/teravector/teravector1809/teravector180900059/110532915-business-team-at-work-cartoon-vector-concept-with-group-of-young-business-people-working-together-at.jpg" alt="" class="img-fluid"></div>
          </div>
        </div>
      </div>
      
        <div class="row text-center">
          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMppv0CvZcFA7ms5_EQqjHRAkA6di_8uhpN9_SONl_PPX57AjYvtd9rL39CRp3PRQvbTxs0ggDQlud9kvq7_44MF4107wXxJs&usqp=CAU&ec=45730947" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Henry Tran</h5><span class="small text-uppercase text-muted">Student ID: 500983653</span>
            </div>
          </div>
          <!-- End-->
    
          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVuOmsmuwaM4o9PVafs65E9t7RjpIhVD4yySZGrY2d6WZ74nWpMSbVowktN6-LbPfiBJHgBTmwku9CgQKFCka7dJQvhfdDBhY&usqp=CAU&ec=45730947" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Xuan Le</h5><span class="small text-uppercase text-muted">Student ID: 500962159</span>
            </div>
          </div>
          <!-- End-->
    
          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMppv0CvZcFA7ms5_EQqjHRAkA6di_8uhpN9_SONl_PPX57AjYvtd9rL39CRp3PRQvbTxs0ggDQlud9kvq7_44MF4107wXxJs&usqp=CAU&ec=45730947" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Alton Dulinen</h5><span class="small text-uppercase text-muted">Student ID: 500843441</span>
            </div>
          </div>
          <!-- End-->
    
          <!-- Team item-->
          <div class="col-xl-3 col-sm-6 mb-5">
            <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMppv0CvZcFA7ms5_EQqjHRAkA6di_8uhpN9_SONl_PPX57AjYvtd9rL39CRp3PRQvbTxs0ggDQlud9kvq7_44MF4107wXxJs&usqp=CAU&ec=45730947" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
              <h5 class="mb-0">Sanveer Gill</h5><span class="small text-uppercase text-muted">Student ID: 500953525</span>
            </div>
          </div>
          <!-- End-->
    
        </div>
      </div>
    </div>
      
      
      <footer class="bg-light pb-5">
        <div class="container text-center">
          <p class="font-italic text-muted mb-0">Enjoy your time!</p>
        </div>
      </footer>
    </main>

    
</body>
</html>