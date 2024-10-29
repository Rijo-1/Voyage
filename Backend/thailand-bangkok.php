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
		  <h1 style="color: white; padding: 12px; text-align: center; color: red;">Bangkok</h1>
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
				<img class="d-block w-100" src="thailand-bangkok3.jpg" alt="First slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="thailand-bangkok4.jpg" alt="Second slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="thailand-bangkok5.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="thailand-bangkok6.jpg" alt="Fourth slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="thailand-bangkok1.jpg" alt="Third slide">
			  </div>
			  <div class="carousel-item">
				<img class="d-block w-100" src="thailand-bangkok2.jpg" alt="Third slide">
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
				<p>Bangkok, the bustling capital of Thailand, is a vibrant metropolis that seamlessly blends traditional culture with modern dynamism. Known for its ornate temples like Wat Phra Kaew and Wat Arun, the city is a spiritual haven amidst its urban sprawl. The Grand Palace stands as a testament to Thailand's rich heritage, while the bustling streets and markets, such as Chatuchak Weekend Market and the floating markets, offer a sensory overload of sights, sounds, and flavors. Skyscrapers and shopping malls coexist with historical neighborhoods and street food stalls, creating a unique juxtaposition of old and new. Bangkok's lively nightlife, featuring rooftop bars and nightclubs, contrasts with serene river cruises on the Chao Phraya River. This city is a gateway to Thai culture, offering an eclectic mix of experiences that captivate every traveler.</p>
			</div>
		  </div>

		  <div class="container">
			
				
					<div class="details">
						<h3 style="color: red;">Details :</h3>
						<p> Here are the details for visiting Bangkok,Thailand :</p>
						
						<b>Overview:</b>
						<ul>
							<li>Location: Bangkok is located in central Thailand, situated on the Chao Phraya River delta.</li>
                            <li>Language: Thai,English</li>
                            <li>Currency: Thai bhat</li>
                            <li>Significance: Bangkok, Thailand's capital, is the country's political, economic, and cultural hub, renowned for its vibrant street life, historical landmarks, and dynamic blend of tradition and modernity.</li>
                                
						</ul>
		
						<b>Attractions:</b>
						<ul>
							<li>The Grand Palace</li>
                            <li>Wat Phra Kaew (Temple of the Emerald Buddha)</li>
                            <li>Wat Arun (Temple of Dawn)</li>
                            <li>Wat Pho (Temple of the Reclining Buddha)</li>
                            <li>Chatuchak Weekend Market</li>
                            <li>Damnoen Saduak Floating Market</li>
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
                            <li>Water Activities: Safety regulations for boating and other activities on Lake Geneva, including mandatory life jackets and designated swimming areas.</li>
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
					<p>If you are seeking an exceptional lodging experience during your visit to Bangkok,Thailand, we highly recommend these hotels </p>
					<div class="row">
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="switzer-geneva-hotel1.jpg.jpg" class="card-img-top" alt="australia">
							<div class="card-body">
							  <h5 class="card-title">Mandarin Oriental, Bangkok:</h5>
							  <p class="card-text">This iconic hotel along the Chao Phraya River is renowned for its luxurious accommodations, exceptional service, and rich history. It features elegant rooms, fine dining options, a world-class spa, and lush gardens.</p>
							  <a href="australia_sydeny_open_house.html" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="grand-hotel-zermatterhof_hotel.jpg" class="card-img-top" alt="brazil">
							<div class="card-body">
							  <h5 class="card-title">The Peninsula Bangkok</h5>
							  <p class="card-text">Another riverside gem, The Peninsula Bangkok offers stunning views, luxurious rooms, and top-notch amenities. Guests enjoy the hotel's beautiful pools, excellent dining, and the distinctive Peninsula hospitality.</p>
							  <a href="#" class="btn btn-primary">Book</a>
							</div>
						  </div>
						</div>
						<div class="col-md-4">
						  <div class="card" style="width: 24rem;">
							<img src="hotel-monte-rosa1.jpg" class="card-img-top" alt="Canada">
							<div class="card-body">
							  <h5 class="card-title">Banyan Tree Bangkok:</h5>
							  <p class="card-text">Known for its luxurious suites, impeccable service, and rooftop Vertigo and Moon Bar, Banyan Tree Bangkok provides a sophisticated urban retreat. The hotel also features a renowned spa and various dining options.</p>
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
