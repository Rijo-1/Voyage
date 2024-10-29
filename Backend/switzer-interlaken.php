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
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Interlaken</h1>
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
				<img class="d-block w-100" src="switzer-intelaken-5.jpg " alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-intelaken-4.jpg" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-intelaken-6.jpg " alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-intelaken-2.jpg" alt="Fourth slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-intelaken-3.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="switzer-intelaken-1.jpg" alt="Third slide">
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
				<p>A
                    Interlaken, Switzerland, nestled between Lake Thun and Lake Brienz, is a picturesque town renowned for its stunning alpine scenery. Framed by the towering peaks of the Eiger, Mönch, and Jungfrau, it serves as a gateway to the Bernese Oberland region. The town is a haven for outdoor enthusiasts, offering activities like hiking, skiing, and paragliding, while also providing a charming array of shops, restaurants, and traditional Swiss culture. Its scenic beauty and adventure opportunities make Interlaken a popular destination for tourists from around the world.</p>
			</div>
		  </div>

		  <div class="container">
			
				
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p> Here are the details for visiting the Matterhorn mountains in Zermatt,Switzerland :</p>
						
						<b>Overview:</b>
						<ul>
							<li>Location: Bernese Oberland region, central Switzerland, between Lake Thun and Lake Brienz.</li>
                            <li>Language: Swiss German, with English, French, and Italian also commonly spoken.</li>
                            <li>Currency: Swiss Franc (CHF).</li>
                            <li>Best Time to Visit:
                                Summer (June to August): For hiking, paragliding, and boating.
                                Winter (December to February): For skiing and snowboarding.
                                Spring (April to June) and Autumn (September to October): For mild weather and fewer tourists.</li>
						</ul>
		
						<b>Top Attractions</b>
						<ul>
							<li>Jungfraujoch - Top of Europe: A stunning train journey to the highest railway station in Europe with panoramic views of the Aletsch Glacier and surrounding peaks.</li>
							<li>Harder Kulm: A funicular ride takes you to a viewpoint offering breathtaking views of Interlaken, Lake Thun, Lake Brienz, and the surrounding mountains.</li>
                            <li>Schynige Platte: Accessible by a scenic cogwheel train, this area is known for its alpine gardens and hiking trails with magnificent views of the Bernese Alps.</li>
                            <li>Schloss Interlaken: Visit this historic castle and its beautiful gardens for a touch of local history and culture. </li>
						</ul>
		
						<b>Restrictions:</b>
						<ul>
							<li>Environmental Regulations: Strict rules to preserve natural beauty, including limits on littering, camping, and fires in unauthorized areas.</li>
                            <li>Noise Restrictions: Quiet hours, typically from 10 PM to 7 AM, to maintain the peace, especially in residential and accommodation areas.</li>
                            <li>Traffic and Parking: Limited parking areas; restrictions on where cars can be driven in the town center, encouraging the use of public transport.</li>
                            <li>Wildlife Protection: Prohibitions on disturbing wildlife and feeding animals to protect local ecosystems.</li>
                            <li>Building Regulations: Architectural guidelines to maintain the traditional Swiss aesthetic of buildings and prevent modern, disruptive structures.</li>
                            <li>Water Activities: Safety regulations for boating, swimming, and other water sports on Lakes Thun and Brienz, including mandatory life jacket</li>
                            <li>Paragliding and Adventure Sports: Specific zones and regulations for takeoff and landing; permits and professional supervision often required.</li>
                            <li>Covid-19 Restrictions: May include mask mandates, social distancing, and limits on group sizes, varying with the current health situation.</li>
                            <li>Smoking Restrictions: Designated smoking areas in public places to reduce litter and fire hazards.</li>
                            <li>Alcohol Consumption: Restrictions on public alcohol consumption in certain areas to ensure public order and safety.</li>
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
					<p>If you are seeking an exceptional lodging experience during your visit to Interlaken,Switzerland, we highly recommend these hotels </p>
					<div class="row">
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="victoria-hotel-interlaken-switz.jpg" class="card-img-top" alt="australia">
							<div class="card-body">
							  <h5 class="card-title"> Victoria-Jungfrau Grand Hotel & Spa:</h5>
							  <p class="card-text">Dating to 1865, this country hotel melds old-world sophistication with a sleek, modern appeal. Surrounded by the Alps and with the legendary view of the Jungfrau Mountain, the Victoria-Jungfrau Grand Hotel & Spa with 216 rooms welcomes you in the heart of the Bernese Oberland.</p>
							  <a href="australia_sydeny_open_house.html" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-interlaken-switz.jpg" class="card-img-top" alt="brazil">
							<div class="card-body">
							  <h5 class="card-title">Hotel Interlaken:</h5>
							  <p class="card-text">Hotel Interlaken is a historic four-star hotel in the heart of Interlaken, combining traditional Swiss charm with modern amenities. Surrounded by beautiful gardens, it offers elegant rooms, a cozy restaurant, and a welcoming bar. Its central location, near the main train station, makes it an ideal base for exploring the stunning Jungfrau region, ensuring a delightful and comfortable stay for both leisure and business travelers.</p>
							  <a href="#" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-bellevue-switz.jpg" class="card-img-top" alt="Canada">
							<div class="card-body">
							  <h5 class="card-title"></h5>Hotel Bellevue:
							  <p class="card-text">Hotel Bellevue is a charming boutique hotel located along the Aare River in Interlaken. It offers cozy, contemporary rooms with stunning river views, a riverside terrace, and a welcoming bar. Guests enjoy complimentary breakfast and free Wi-Fi, making it an ideal choice for a comfortable and scenic stay in the heart of Interlaken.</p>
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
