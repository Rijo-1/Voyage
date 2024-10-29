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
    <title>Thailand</title>
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
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Pattaya</h1>
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
				<p>Pattaya is a bustling coastal city in Thailand known for its vibrant nightlife, beautiful beaches, and diverse entertainment options. With its lively atmosphere and array of attractions, including water parks, zoos, and cultural landmarks, Pattaya offers something for every traveler, from beach lovers to adventure seekers.</p>
			</div>
		  </div>

		  <div class="container">
			
				
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p> Here are the details for visiting Pattaya,Thailand :</p>
						
						<b>Overview:</b>
						<ul>
							<li>Location: Pattaya is located on the eastern Gulf coast of Thailand, about 150 kilometers southeast of Bangkok.</li>
                            <li>Language: Thai </li>
                            <li>Currency: The currency used in Pattaya, as in the rest of Thailand, is the Thai Baht (THB)T</li>
                            <li>Significance: Pattaya is a bustling coastal city known for its vibrant nightlife, stunning beaches, and diverse attractions, drawing tourists from around the world for relaxation, entertainment, and adventure.</li>
                                
						</ul>
		
						<b>Attractions:</b>
						<ul>
							<li>Pattaya Beach</li>
                            <li>Walking Street</li>
                            <li>Sanctuary of Truth</li>
                            <li>Nong Nooch Tropical Botanical Garden</li>
                            <li>Cartoon Network Amazone Water Park</li>
                            <li>Underwater World Pattaya</li>
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
					<p>If you are seeking an exceptional lodging experience during your visit to Pattaya,Thailand, we highly recommend these hotels </p>
					<div class="row">
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="switzer-geneva-hotel1.jpg.jpg" class="card-img-top" alt="australia">
							<div class="card-body">
							  <h5 class="card-title">Centara Grand Mirage Beach Resort Pattaya:</h5>
							  <p class="card-text">This luxurious beachfront resort offers spacious rooms, multiple swimming pools, water slides, a kids' club, and a range of dining options. It's a popular choice for families and couples looking for a lavish retreat.

							  </p>
							  <a href="https://www.centarahotelsresorts.com/centara/cdd?utm_source=adwords&utm_medium=ppc&utm_campaign=brand-search-cdd&gad_source=1&gclid=CjwKCAjwmYCzBhA6EiwAxFwfgC8SJ3wMqMmTq8NaheewtzInp3xhiV_3u7oUCHjFpfP7zlYRmoO8xRoCt0cQAvD_BwE&clickid=CjwKCAjwmYCzBhA6EiwAxFwfgC8SJ3wMqMmTq8NaheewtzInp3xhiV_3u7oUCHjFpfP7zlYRmoO8xRoCt0cQAvD_BwE" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="grand-hotel-zermatterhof_hotel.jpg" class="card-img-top" alt="brazil">
							<div class="card-body">
							  <h5 class="card-title">Hilton Pattaya:</h5>
							  <p class="card-text">Situated in the heart of Pattaya overlooking the Gulf of Thailand, this upscale hotel features modern rooms with panoramic views, a rooftop bar, infinity pool, spa, and several dining outlets. It's known for its elegant ambiance and attentive service.</p>
							  <a href="https://www.hilton.com/en/hotels/bkkhphi-hilton-pattaya/?WT.mc_id=zLADA0TH1HI2PSH3GGL4INTBPP5dkt6BKKHPHI7en_&epid!_&ebuy!&&&&&gad_source=1&gclid=CjwKCAjwmYCzBhA6EiwAxFwfgLEiLMS7DV97gqEiNS65cxF_V-fK1v8OJMQJZTLjXXuaOK1ttww-dRoC2g0QAvD_BwE&gclsrc=aw.ds" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-monte-rosa1.jpg" class="card-img-top" alt="Canada">
							<div class="card-body">
							  <h5 class="card-title">InterContinental Pattaya Resort:</h5>
							  <p class="card-text">Nestled amidst tropical gardens overlooking the Gulf of Thailand, this five-star resort offers luxurious accommodation, private villas with plunge pools, a beachfront infinity pool, spa facilities, and multiple dining options. It's an ideal choice for those seeking a tranquil and indulgent escape.</p>
							  <a href="https://pattaya.intercontinental.com/" class="btn btn-primary">Book</a>
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
