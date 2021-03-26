<!-- NAVBAR code that we inlucde in all of our pages -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
      <a class="navbar-brand mb-0 h1" href="../index.php">Maarkt</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../aboutus.php">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Departments
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="../departments/allitems.php">All Items</a>
              <a class="dropdown-item" href="../departments/automotive.php">Automotive</a>
              <a class="dropdown-item" href="../departments/books.php">Books</a>
              <a class="dropdown-item" href="../departments/clothing.php">Clothing</a>
              <a class="dropdown-item" href="../departments/electronics.php">Electronics</a>
              <a class="dropdown-item" href="../departments/furniture.php">Furniture</a>
              <a class="dropdown-item" href="../departments/music.php">Music</a>
              <a class="dropdown-item" href="../departments/sportsoutdoors.php">Sports & Outdoors</a>
              <a class="dropdown-item" href="../departments/videogames.php">Video Games</a>
              <a class="dropdown-item" href="../departments/other.php">Other</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Search
            </a>
            <div id="searchbardropdown" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <form action="../search.php" method="POST" class="form-inline flex-nowrap">
                <input id="navsearch" class="form-control mr-sm-2 ml-sm-5" type="search" placeholder="Search" aria-label="Search" name="query">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link " href="#"><button id="createPostBtn" data-login="<?= ((isset($_SESSION['login'])) ? '#' : '../auth/login.php') ?>" class="btn btn-outline-info my-2 my-sm-0" type="button">Create Post</button></a>
          </li>
          <?php if (isset($_SESSION['login'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="../auth/logout.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Logout</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/profile.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">My Account</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../chat/room.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Chat</button></a>
            </li>

          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="../auth/signup.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Sign Up</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../auth/login.php"><button class="btn btn-outline-info my-2 my-sm-0" type="submit">Login</button></a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>