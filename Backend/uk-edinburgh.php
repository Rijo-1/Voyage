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
    <title>United Kingdom</title>
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
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Edinburgh</h1>
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
				<img class="d-block w-100" src="uk-edinburgh2.jpg" alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="uk-edinburgh3.jpg" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="uk-edinburgh1.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="uk-london5 (1).jpg" alt="Fourth slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="uk-london4.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="uk-london6.jpg" alt="Third slide">
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
				<p>
                    Edinburgh, the capital of Scotland, is a city steeped in history and culture, renowned for its striking medieval and Georgian architecture, including the iconic Edinburgh Castle perched atop Castle Rock and the Palace of Holyroodhouse. The city’s historic and cultural heart is the Royal Mile, which stretches from the castle to Holyroodhouse, lined with historic buildings, shops, and pubs. Edinburgh is also famous for its vibrant festivals, most notably the Edinburgh International Festival and the Fringe, which attract artists and visitors from around the world each August. With its blend of ancient history, modern attractions, and breathtaking landscapes, including the nearby Arthur's Seat and the Salisbury Crags, Edinburgh offers a unique and captivating experience.</p>
			</div>
		  </div>

		  <div class="container">
			
				
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p> Here are the details for visiting Edinburgh,UK:</p>
						
						<b>Overview:</b>
						<ul>
							<li>Location: Edinburgh is located in the southeastern part of Scotland, on the southern shore of the Firth of Forth, which is an estuary of the River Forth.</li>
                            <li>Language: English</li>
                            <li>Currency: The currency used in London is the British Pound Sterling (GBP).</li>
                            <li>Significance: Edinburgh, the capital of Scotland, is renowned for its rich history, vibrant cultural festivals, and stunning architectural landmarks, making it a key cultural and political center. </li>
                                
						</ul>
		
						<b>Attractions:</b>
						<ul>
							<li>Edinburgh Castle</li>
                            <li>The Royal Mile</li>
                            <li>Palace of Holyroodhouse</li>
                            <li>Arthur's Seat</li>
                            <li>The National Museum of Scotland</li>
                            <li>The Scottish Parliament Building</li>
						</ul>
		
						<b>Restrictions:</b>
						<ul>
							<li>Noise Restrictions: Quiet hours are enforced, typically from 10 PM to 7 AM, in residential areas to maintain public peace.</li>
                            <li>Environmental Regulations: Strict laws to protect the environment, including prohibitions on littering, waste disposal, and pollution.</li>
                            <li>Smoking Restrictions: Smoking is banned in enclosed public spaces, including restaurants, bars, and public transport.</li>
                            <li>Traffic and Parking: Limited parking areas and regulations in the city center to reduce congestion, encouraging the use of public transport.</li>
                            <li>Alcohol Consumption: Restrictions on public alcohol consumption in certain areas to maintain order and safety.</li>
                            <li>Building Regulations: Guidelines to preserve the architectural heritage and aesthetic of the city, with specific rules for renovations and new constructions.</li>
                            <li>Public Gatherings: Permits are required for large public gatherings, protests, and events to ensure safety and order.</li>
                            <li>Covid-19 Restrictions: Health measures such as mask mandates, social distancing, and limits on group sizes, depending on the current health situation.</li>
                            <li>Wildlife Protection: Prohibitions on disturbing wildlife and feeding animals in natural areas and parks.</li>
                            <li>Water Activities: Safety regulations for boating and other activities, including mandatory life jackets and designated swimming areas.</li>
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
					<p>If you are seeking an exceptional lodging experience during your visit to Edinburgh,UK, we highly recommend these hotels </p>
					<div class="row">
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="switzer-geneva-hotel1.jpg.jpg" class="card-img-top" alt="australia">
							<div class="card-body">
							  <h5 class="card-title">The Balmoral Hotel::</h5>
							  <p class="card-text">This iconic luxury hotel, located at the east end of Princes Street, offers elegant rooms, exceptional service, and stunning views of Edinburgh Castle. It also features the Michelin-starred restaurant Number One and the stylish Balmoral Bar.

							  </p>
							  <a href="https://www.theritzlondon.com/" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="grand-hotel-zermatterhof_hotel.jpg" class="card-img-top" alt="brazil">
							<div class="card-body">
							  <h5 class="card-title">The Witchery by the Castle:</h5>
							  <p class="card-text">Situated near Edinburgh Castle, this unique and opulent hotel offers nine lavishly decorated suites. Known for its rich gothic decor, it provides a romantic and atmospheric experience, with an award-winning restaurant

                                .</p>
							  <a href="https://www.thesavoylondon.com/" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-monte-rosa1.jpg" class="card-img-top" alt="Canada">
							<div class="card-body">
							  <h5 class="card-title">The Scotsman Hotel:</h5>
							  <p class="card-text">Housed in the former Scotsman newspaper building, this boutique hotel combines historic charm with modern luxury. It is located near the Royal Mile and offers well-appointed rooms, a spa, and a cinema.</p>
							  <a href="https://www.claridges.co.uk/" class="btn btn-primary">Book</a>
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
