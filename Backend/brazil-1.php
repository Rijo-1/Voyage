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
$location_id = 4; // Assuming 4 is the location_id for Monday Palace
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
    <title>Rio de Janeiro</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
	<style>
		.card {
			 margin-bottom: 30px;
			 margin-right: 15px;
			 margin-left: 15px;
			 border: 1px black; /* Match the box color */
		 }
		 .card-img-top {
			 object-fit: cover;
			 height: 200px;
			 width: 100%;
		 }
		 .recommendation .card {
			 background-color: black; /* Match the box color */
			 color: white;
		 }
		 .recommendation .card-body {
			 background-color: black; /* Match the box color */
		 }
		 /* Add margin to the columns to create space between them */
		 .row.justify-content-between > [class*="col-"] {
			 margin-right: 15px; /* Adjust the margin as needed */
		 }
 
		 /* Remove margin from the last column to avoid extra space */
		 .row.justify-content-between > [class*="col-"]:last-child {
			 margin-right: 0;
		 }
 
	 </style>
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
				
			  </div>
			</div>
		  </nav>
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Rio de Janeiro</h1>
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
				<img class="d-block w-100" src="brazil-1-1.webp" alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="brazil-1-2.jpg" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="brazil-1-3.webp" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="brazil-1-4.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="brazil-1-5.avif" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="brazil-1-6.jpg" alt="Third slide">
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
				<p>Rio de Janeiro is a vibrant coastal city in Brazil known for its stunning beaches, iconic landmarks, and lively culture.</p>
				<p>Visitors to Rio can enjoy a range of activities, including sunbathing on Copacabana Beach, hiking to the summit of Sugarloaf Mountain for panoramic views, and exploring the historic streets of downtown Rio.</p>
				<p>The city is also famous for its annual Carnival celebration, featuring elaborate parades, samba music, and street parties.</p>
			  </div>
		  </div>

		  <div class="container">
			<div class="details">
				<h3 style="color: red;">Details :</h3>
				<p>Here are some details for your visit to Rio de Janeiro:</p>
				<b>Best Time to Visit:</b>
				<ul>
				  <li>The best time to visit Rio is during the summer months (December to March) when the weather is warm and the beaches are bustling with activity.</li>
				  <li>Avoid visiting during the rainy season (April to June) to enjoy clear skies and sunny days.</li>
				</ul>
				<b>Activities:</b>
				<ul>
				  <li>Beach Days: Spend time relaxing on the famous beaches of Copacabana and Ipanema.</li>
				  <li>Landmarks: Visit iconic sites such as Christ the Redeemer, Sugarloaf Mountain, and the historic neighborhood of Santa Teresa.</li>
				  <li>Cultural Experiences: Immerse yourself in Brazilian culture by attending a samba show, trying local cuisine, and exploring the city's vibrant street art scene.</li>
				  <li>Carnival: If you're visiting during February or March, don't miss the opportunity to experience Rio's legendary Carnival celebration.</li>
				</ul>
				<b>Safety:</b>
				<ul>
				  <li>Exercise caution and be aware of your surroundings, especially in crowded tourist areas.</li>
				  <li>Avoid displaying valuable items and keep your belongings secure to prevent theft.</li>
				  <li>Use reputable transportation services and avoid walking alone at night in unfamiliar areas.</li>
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
						<input type="text" class="form-control" id="location_id" name="location_id" value="4" readonly>
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
		
			</div>
		<div class="recommendation">
			<h3 style="color: red;">Recommendations :</h3>
			<p>For unforgettable accommodations in Rio de Janeiro, consider these top-rated hotels:</p>
			<div class="row">
				<div class="col-md-4">
				  <div class="card" style="width: 24rem;">
					<img src="brazil-1-hot-1.jpg" class="card-img-top" alt="Rio de Janeiro">
					<div class="card-body">
						<h5 class="card-title">Copacabana Palace</h5>
						<p class="card-text">Experience luxury at its finest at the Copacabana Palace, an iconic hotel overlooking Copacabana Beach.</p>
						<a href="https://www.belmond.com/hotels/south-america/brazil/rio-de-janeiro/belmond-copacabana-palace" class="btn btn-primary">Check out</a>
					 </div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="card" style="width: 24rem;">
					<img src="brazil-1-hot-2.jpg" class="card-img-top" alt="Rio de Janeiro">
					<div class="card-body">
						<h5 class="card-title">Fasano Hotel Rio de Janeiro</h5>
						<p class="card-text">Indulge in contemporary luxury and breathtaking ocean views at the Fasano Hotel Rio de Janeiro.</p>
						<a href="https://www.fasano.com.br/rio-de-janeiro/hotel" class="btn btn-primary">Check out</a>
					 </div>
				  </div>
				</div>
				<div class="col-md-4">
				  <div class="card" style="width: 24rem;">
					<img src="brazil-1-hot-3.jpg" class="card-img-top" alt="Rio de Janeiro">
					<div class="card-body">
						<h5 class="card-title">Santa Teresa Hotel RJ - MGallery</h5>
						<p class="card-text">Discover charm and elegance in the historic neighborhood of Santa Teresa at this boutique hotel.</p>
						<a href="https://all.accor.com/hotel/8949/index.en.shtml?y_source=1_MTM4NjQ4MzktNTUxLWxvY2F0aW9uLndlYnNpdGU%3D" class="btn btn-primary">Check out</a>
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
