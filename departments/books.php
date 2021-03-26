<!-- BOOKS PAGE, this page displays all posts made on our website with the BOOKS category -->

<?php
session_start();
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
				<h1>Books</h1>
				<p class="lead text-muted">Here you will find all types of books such as school textbooks, comic books, novels, and many more!</p>
			</div>
		</section>

		<div class="album py-5 bg-light">
			<div class="container">
				<h1>Results</h1>
				<br>
				<div class="row">
					<?php
					// Create connection
					$mysqli = new mysqli("localhost", "d59tran", "cadOtfau", "d59tran");
					// Check connection
					if ($mysqli->connect_error) {
						die("Connection failed: " . $mysqli->connect_error);
					}

					// Get all posts from the Textbooks category
					$sql = "SELECT * FROM posts WHERE category = 'Textbooks' ORDER BY id DESC";
					$result = $mysqli->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while ($row = $result->fetch_assoc()) {
							echo '<div class="col-md-4">';
							echo '<div class="card mb-4 shadow-sm">';
							echo '<a href="../posts/postDetail.php?idPost='. $row["id"] .'"><img class="card-img-top" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" src="../images/' . $row['image'] . '"><rect width="100%" height="100%" fill="#55595c"/></a>';
							echo '<div class="card-body">';
							    echo '<a href="../posts/postDetail.php?idPost='. $row["id"] .'"><h5 class="card-title">' . $row["itemName"] . '</h5> </a>';
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
							echo '<a href="../chat/chat.php?id=' . $row['user_id'] . '"><button type="button" class="btn btn-sm btn-info">Chat now</button></a>';
							echo '</div>';
							echo '<div class="card-footer">';
							echo '<small class="text-muted">Date Posted: 12-02-2020</small>';
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