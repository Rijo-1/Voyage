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
    <title>Toronto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
	<link rel="stylesheet" href="style4.css">
  </head>
  <body>
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
        <h1 style="color: white; padding: 12px; text-align: center; color: red;">Toronto</h1>
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
              <img class="d-block w-100" src="canada-3-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="canada-3-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="canada-3-3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="canada-3-4.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="canada-3-5.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="canada-3-6.jpg" alt="Third slide">
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
				<h3 style="color: red;">Description :</h3>
				<p>Toronto, the capital city of Ontario, Canada, is a vibrant metropolis known for its diverse culture, iconic landmarks, and bustling urban life.</p>
				<p>Famous attractions include the CN Tower, the Royal Ontario Museum, and the Distillery Historic District, offering a mix of modern and historic experiences.</p>
				<p>Toronto is also renowned for its world-class dining, thriving arts scene, and beautiful waterfront along Lake Ontario.</p>
			</div>
		</div>
		
		

		<div class="container">
			<div class="details">
				<h3 style="color: red;">Details :</h3>
				<p>Here are some details for your visit to Toronto:</p>
				<b>Best Time to Visit:</b>
				<ul>
					<li>The best time to visit Toronto is during the late spring to early fall (May to October) when the weather is pleasant, and outdoor events are in full swing.</li>
					<li>Winter is also a unique time to visit with festive activities and the chance to experience the city’s holiday charm.</li>
				</ul>
				<b>Activities:</b>
				<ul>
					<li>Landmarks: Visit iconic sites such as the CN Tower, Casa Loma, and the Toronto Islands.</li>
					<li>Museums and Galleries: Explore cultural institutions like the Royal Ontario Museum and the Art Gallery of Ontario.</li>
					<li>Shopping and Dining: Enjoy the eclectic mix of shops and restaurants in neighborhoods like Kensington Market, Queen Street West, and Yorkville.</li>
					<li>Entertainment: Catch a show in the Entertainment District or attend one of the many festivals and events throughout the year.</li>
				</ul>
				<b>Safety:</b>
				<ul>
					<li>Toronto is generally a safe city, but it's always wise to stay alert and aware of your surroundings, especially in busy tourist areas.</li>
					<li>Use public transportation or reputable ride-sharing services, particularly if traveling at night.</li>
					<li>Keep personal belongings secure and avoid displaying valuables openly.</li>
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
			<p>For unforgettable accommodations in Toronto, consider these top-rated hotels:</p>
			<div class="row">
				<div class="col-md-4">
					<div class="card" style="width: 24rem;">
						<img src="canada-3-hot-1.jpg" class="card-img-top" alt="Toronto Hotel">
						<div class="card-body">
							<h5 class="card-title">Fairmont Royal York</h5>
							<p class="card-text">Stay in elegance and prestigeous at the Fairmont Royal York, which is a historic hotel located in the heart of downtown Toronto.</p>
							<a href="https://www.fairmont.com/royal-york-toronto/" class="btn btn-primary">Check out</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 24rem;">
						<img src="canada-3-hot-2.jpg" class="card-img-top" alt="Toronto Hotel">
						<div class="card-body">
							<h5 class="card-title">Shangri-La Hotel Toronto</h5>
							<p class="card-text">Experience luxury and modern amenities at the Shangri-La Hotel, offering stunning views and exceptional service.</p>
							<a href="https://www.shangri-la.com/toronto/shangrila/" class="btn btn-primary">Check out</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card" style="width: 24rem;">
						<img src="canada-3-hot-3.jpg" class="card-img-top" alt="Toronto Hotel">
						<div class="card-body">
							<h5 class="card-title">The Ritz-Carlton, Toronto</h5>
							<p class="card-text">Enjoy unparalleled luxury and service at The Ritz-Carlton, located near the Entertainment District and many top attractions.</p>
							<a href="https://www.ritzcarlton.com/en/hotels/canada/toronto" class="btn btn-primary">Check out</a>
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
