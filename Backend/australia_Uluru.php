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
	<link rel="stylesheet" href="style4.css">
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
				<h1 style="color: white; padding: 12px; text-align: center; color: red;">Uluru (Ayers Rock)</h1>
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					
					</ol>
					<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="aust-uluru-1.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="aust-uluru-2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="aust-uluru-3.jpg" alt="Third slide">
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
						<p>Uluru, also known as Ayers Rock, is a massive sandstone monolith located in the heart of the Northern Territory in Australia. It is a significant cultural site for the Anangu people, the traditional landowners, and is recognized for its stunning red hue, especially at sunrise and sunset.</p>
						<p>Visitors to Uluru can enjoy a range of activities, including guided walks, cultural tours, and star gazing. The rock is home to ancient rock art and springs, offering a deep connection to the cultural history of the indigenous people.</p>
						<p>Due to its cultural and natural importance, Uluru is a UNESCO World Heritage Site and one of Australia's most iconic landmarks.</p>
					</div>
				</div>

				<div class="container">
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p>Here are the details for visiting Uluru:</p>
						<b>Best Time to Visit:</b>
						<ul>
						<li>The best time to visit is from May to September when the weather is cooler and more pleasant.</li>
						<li>Avoid the peak summer months (December to February) as temperatures can be extremely high.</li>
						</ul>
						<b>Activities:</b>
						<ul>
						<li>Guided Walks: Explore the base of Uluru with knowledgeable guides who share insights into its geology and cultural significance.</li>
						<li>Cultural Tours: Learn about the Anangu people and their traditions, stories, and art.</li>
						<li>Sunrise and Sunset Viewing: Witness the breathtaking color changes of Uluru at dawn and dusk.</li>
						<li>Field of Light: Experience the spectacular art installation by Bruce Munro, featuring thousands of illuminated stems lighting up the desert.</li>
						</ul>
						<b>Entry Fees:</b>
						<ul>
						<li>There is an entry fee to Uluru-Kata Tjuta National Park, which is around $38 AUD for a 3-day pass.</li>
						</ul>
						<b>Restrictions:</b>
						<ul>
						<li>Climbing Uluru is prohibited out of respect for the Anangu people's wishes.</li>
						<li>Stay on designated paths to protect the environment and cultural sites.</li>
						<li>Follow guidelines provided by park authorities to ensure a respectful and safe visit.</li>
						<li>Photography is restricted in certain areas; adhere to posted signs and guidelines.</li>
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
					</div>
						<div class="recommendation">
							<h3 style="color: red;">Recommendations :</h3>
							<p>If you are seeking exceptional lodging experiences during your visit to Uluru, we highly recommend these hotels:</p>
							<div class="row">
								<div class="col-md-4">
									<div class="card" style="width: 24rem;">
										<img src="aust-uluru-hotel-1.jpg" class="card-img-top" alt="Uluru">
										<div class="card-body">
											<h5 class="card-title">Longitude 131</h5>
											<p class="card-text">Longitude 131 offers luxury tented pavilions with stunning views of Uluru. Enjoy fine dining, exclusive tours, and unparalleled comfort.</p>
											<a href="https://longitude131.com.au/" class="btn btn-primary">Check out</a>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card" style="width: 24rem;">
									<img src="aust-uluru-hotel-2.jpg" class="card-img-top" alt="Uluru">
									<div class="card-body">
										<h5 class="card-title">Sails in the Desert</h5>
										<p class="card-text">Sails in the Desert offers modern accommodations with indigenous-inspired decor, a pool, and easy access to the national park.</p>
										<a href="https://www.guestreservations.com/sails-in-the-desert-a-member-of-pullman-hotels/booking?gad_source=1&gclid=CjwKCAjwjeuyBhBuEiwAJ3vuocx7SQWGiTHMJR-NWIP4ar94zbJOM8Q8HB4EWwagDu-KYF0yN0smTxoCpFIQAvD_BwE" class="btn btn-primary">Check out</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card" style="width: 24rem;">
									<img src="aust-uluru-hotel-3.jpg" class="card-img-top" alt="Uluru">
									<div class="card-body">
										<h5 class="card-title">The Lost Camel Hotel</h5>
										<p class="card-text">The Lost Camel Hotel offers stylish and affordable accommodations in the heart of the Ayers Rock Resort, perfect for exploring Uluru and Kata Tjuta.</p>
										<a href="https://www.ayersrockresort.com.au/accommodation/the-lost-camel" class="btn btn-primary">Check out</a>
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
