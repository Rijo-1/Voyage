<?php
// Start the session
session_start();

// Include database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $location_id = $_POST['location_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (user_id, username, location_id, rating, comment) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiis", $user_id, $username, $location_id, $rating, $comment);

    if ($stmt->execute()) {
        $message = "New review created successfully";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all reviews for the specific location
$location_id = 1; // Assuming 1 is the location_id for Sydney Opera House
$sql = "SELECT user_id, username, rating, comment, created_at FROM reviews WHERE location_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $location_id);
$stmt->execute();
$result = $stmt->get_result();

$reviews = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Australia</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
  </head>
  <body1>
    <div class="title1">
	  <div>
		<nav class="navbar navbar-expand-lg navbar-light bg-body-dark">
			<div class="container-fluid">
			  <a class="navbar-brand" href="#"><h1 style="color: red;">Voyage</h1></a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="homepage.html" style="color: white;">Home</a>
				  </li>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="about.html" style="color: white;">About</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="index.html" style="color: white;">Log out</a>
				  </li>
				</ul>
				<form class="d-flex" role="search">
				  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				  <button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			  </div>
			</div>
		  </nav>
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Zermatt</h1>
		  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
			  <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
			  
			</ol>
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img class="d-block w-100" src="switzer-Mt-Matterhorn-Zermatt.webp" alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-Mt-Matterhorn-Zermatt-2.jpg" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-Mt-Matterhorn-Zermatt-3.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switer-Mt-Matterhorn-Zermatt-4.jpg" alt="Fourth slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="matterhorn_switz5.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="matterhorn_6.jpg" alt="Third slide">
			  </div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
		  </div>
		  <div class="description">
			<div style="color: white;">
				<h3 style="color: red;">Description :<br></h3>
				<p>At 4,478 metres, the majestic Matterhorn, also called the "Jewel of the Swiss Alps" and certainly the most famous mountain in Europe, looms over the breathtaking Alpine panorama. This Switzerland landmark is at the border of the western Swiss canton of Valais between Zermatt and the Italian resort of Breuil-Cervinia, and offers a paradise for all nature-lovers looking for peace and quiet. Its symmetric pyramid shape, the rocky tooth reaching the sky and the light reflections of the nearby Stellisee make the Matterhorn’s landscape a unique natural spectacle in Zermatt..</p>
			</div>
		  </div>

		  <div class="container">
			
				
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p> Here are the details for visiting the Matterhorn mountains in Zermatt,Switzerland :</p>
						
						<b>Timings:</b>
						<ul>
							<li>The Matterhorn Glacier Paradise cable car operates from 9 AM to 4 PM depending on the weather conditions.</li>
							<li>Timings may vary for guided tours, performances, and other events.</li>
						</ul>
		
						<b>Entry Fare:</b>
						<ul>
							<li>Zermatt - Cervinia single ride	CHF 124.00	CHF 156.00</li>
							<li>Zermatt - Cervinia return trip	CHF 190.00	CHF 240.00</li>
						</ul>
		
						<b>Restrictions:</b>
						<ul>
							<li>Climbing: Only for experienced climbers; hire a guide if needed.</li>
							<li>Access to Zermatt: Car-free; park in Täsch, use shuttle trains or electric taxis.</li>
							<li>Hiking Trails: Check for closures due to weather; stay on marked paths.</li>
							<li>Cable Cars: Seasonal operation; may close for weather or maintenance.</li>
							<li>Environmental Protection: Carry out waste; respect local conservation rules.</li>
							<li>Safety: Be aware of altitude sickness; know emergency number (144).</li>
						</ul>
					</div>
				
				
					<div class="reviews">
						<h3 style="color: red;">Reviews :</h3>
	
						<?php if (isset($message)): ?>
							<div class="alert alert-info"><?php echo $message; ?></div>
						<?php endif; ?>
	
						<!-- Review Form -->
						<form id="reviewForm" method="POST" action="">
							<div class="form-group">
								<label for="user_id">User ID:</label>
								<input type="text" class="form-control" id="user_id" name="user_id" required>
							</div>
							<div class="form-group">
								<label for="username">Username:</label>
								<input type="text" class="form-control" id="username" name="username" required>
							</div>
							<div class="form-group">
								<label for="location_id">Location ID:</label>
								<input type="text" class="form-control" id="location_id" name="location_id" value="1" readonly>
							</div>
							<div class="form-group">
								<label for="rating">Rating:</label>
								<select class="form-control" id="rating" name="rating" required>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
								</select>
							</div>
							<div class="form-group">
								<label for="comment">Review:</label>
								<textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
	
						<!-- Display Reviews -->
						<div id="reviewList">
							<?php foreach ($reviews as $review): ?>
								<p><b>User ID: <?php echo htmlspecialchars($review['user_id']); ?> (Username: <?php echo htmlspecialchars($review['username']); ?>)</b> (<?php echo $review['rating']; ?>/5):<br>
								<?php echo htmlspecialchars($review['comment']); ?><br>
								<small>Reviewed on: <?php echo $review['created_at']; ?></small></p>
							<?php endforeach; ?>
						</div>
					</div>
				

				<div class="recommendation">
					<h3 style="color: red;">Recommendations :</h3>
					<p>If you are seeking an exceptional lodging experience during your visit to Zermatt,Switzerland, we highly recommend these hotels </p>
					<div class="row">
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="zermatt_hotel_1.jpg" class="card-img-top" alt="australia">
							<div class="card-body">
							  <h5 class="card-title"> The Omnia</h5>
							  <p class="card-text">Situated on a rock, 45 metres above the roofs of central Zermatt, guests access The Omnia via a tunnel leading to an elevator, which brings them right into the lobby.Guests can taste refined international cuisine made from selected seasonal ingredients in the restaurant or on the terrace. After dinner, guests can relax on the sofa in front of the fireplace, sipping an espresso or a grappa.
								</p>
							  <a href="australia_sydeny_open_house.html" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="grand-hotel-zermatterhof_hotel.jpg" class="card-img-top" alt="brazil">
							<div class="card-body">
							  <h5 class="card-title">Grand Hotel Zermatterhof</h5>
							  <p class="card-text">The Grand Hotel Zermatterhof lies at the very heart of Zermatt and is host to royalty, Hollywood celebrities and mountaineers. Steeped in history with views of the Matterhorn, the hotel continues welcoming guests from around the world who enjoy experiencing personal service, timeless surroundings and the very best nature has to offer.</p>
							  <a href="#" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-monte-rosa1.jpg" class="card-img-top" alt="Canada">
							<div class="card-body">
							  <h5 class="card-title">Hotel Monte Rosa</h5>
							  <p class="card-text">Hotel Monterosa is located in the center of Alagna Valsesia with close walking distance to the ski lift and all restaurants and shops.In the  winter you can enjoy the fantastic skiing in Monterosa Ski in the three valleys of Alagna, Gressoney and Champoluc.</p>
							  <a href="#" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
					  </div>
				</div>
			
		</div>
		
		  
	  </div>
	 
  </div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
