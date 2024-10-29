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
                                <a class="nav-link" href="logout.php" style="color: white;">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">GOA</h1>
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
                        <img class="d-block w-100" src="./g2.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./g5.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./g1.jpeg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./g3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./g4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./g6.jpg" alt="Third slide">
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
                    <p>Nestled along the sun-kissed shores of the Arabian Sea, Goa beckons with its irresistible charm as a quintessential tropical paradise. With its palm-fringed beaches, vibrant culture, and rich history, this coastal haven captivates visitors with a blend of relaxation, adventure, and cultural immersion. Whether you're soaking up the sun on the golden sands of Calangute, exploring the ancient churches of Old Goa, or savoring the flavors of Goan cuisine, Goa offers an unforgettable escape that tantalizes the senses and leaves an indelible mark on the soul.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Goa:</p>
<ul>
    <li>
        <b>Basilica of Bom Jesus:</b>
        <p>Visit this UNESCO World Heritage Site, housing the remains of St. Francis Xavier, and marvel at its baroque architecture and intricate interiors.</p>
    </li>
    <li>
        <b>Calangute Beach:</b>
        <p>Known as the "Queen of Beaches," Calangute offers golden sands, azure waters, and a lively atmosphere with water sports, beach shacks, and vibrant nightlife.</p>
    </li>
    <li>
        <b>Fort Aguada:</b>
        <p>Explore this 17th-century Portuguese fort, perched atop a hill overlooking the Arabian Sea, and enjoy panoramic views of the coastline and adjoining Aguada Jail.</p>
    </li>
    <li>
        <b>Dudhsagar Waterfalls:</b>
        <p>Experience the majestic Dudhsagar Waterfalls, cascading from a height of 310 meters amidst lush greenery, offering a scenic backdrop for trekking and photography.</p>
    </li>
    <li>
        <b>Old Goa:</b>
        <p>Step back in time and explore the historic charm of Old Goa, home to ancient churches, cathedrals, and convents, reflecting the region's rich colonial heritage.</p>
    </li>
</ul>
<br><br>
<p>Here are some activities to enjoy in Goa:</p>
<ul>
    <li>
        <b>Beach Hopping:</b>
        <p>Explore Goa's diverse coastline with beach hopping, from the vibrant shores of Baga and Anjuna to the serene stretches of Palolem and Agonda, each offering its own unique vibe and water sports.</p>
    </li>
    <li>
        <b>Water Sports:</b>
        <p>Indulge in thrilling water sports such as parasailing, jet skiing, banana boat rides, and scuba diving, offered at various beaches across Goa, providing an adrenaline-pumping experience amidst scenic surroundings.</p>
    </li>
    <li>
        <b>Goa Carnival:</b>
        <p>Join the vibrant festivities of the Goa Carnival, held annually in February, featuring colorful parades, live music, dance performances, and traditional Goan cuisine, offering a cultural extravaganza for visitors.</p>
    </li>
    <li>
        <b>Backwater Cruise:</b>
        <p>Embark on a leisurely backwater cruise along the tranquil rivers of Goa, such as Mandovi and Zuari, amidst lush mangroves and picturesque villages, providing a serene escape from the bustling beach scene.</p>
    </li>
    <li>
        <b>Spice Plantation Tour:</b>
        <p>Discover the rich flavors of Goan cuisine with a spice plantation tour, where you can explore lush plantations, learn about spice cultivation, and indulge in a traditional Goan meal, offering a sensory delight for food enthusiasts.</p>
    </li>
</ul>



                    
                </div>
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
                            <input type="text" class="form-control" id="location_id" name="location_id" value="18" readonly>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Goa, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./goa_h1.webp" class="card-img-top" alt="Goa Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">The Leela Goa</h5>
                                    <p class="card-text">Experience luxury and relaxation at The Leela Goa, nestled amidst 75 acres of lush gardens along the pristine Mobor Beach.
                                        This beachfront resort offers luxurious accommodations, world-class dining options, and holistic wellness experiences at the spa.
                                        Guests can also enjoy outdoor activities such as golfing, beach volleyball, and water sports.</p>
                                    <a href="https://theleelagoa.chobs.in/ "class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./goa_h2.webp" class="card-img-top" alt="Goa Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Taj Exotica Resort & Spa, Goa</h5>
                                    <p class="card-text">Escape to paradise at Taj Exotica Resort & Spa, Goa, located on the southwest coast of Goa overlooking the Arabian Sea.
                                        This luxury resort offers elegant villas, exquisite dining options, and rejuvenating spa treatments.
                                        Guests can relax on the private beach, play golf at the nearby course, or explore Goa's vibrant culture and nightlife.</p>
                                    <a href="https://www.tajhotels.com/en-in/taj/taj-exotica-goa/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./goa_h3.jpg" class="card-img-top" alt="Goa Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Grand Hyatt Goa</h5>
                                    <p class="card-text">Experience luxury and entertainment at Grand Hyatt Goa, situated on the serene Bambolim Bay.
                                        This resort offers spacious rooms, diverse dining options, and a range of recreational activities including a casino, water sports, and golf.
                                        Guests can also relax by the poolside or pamper themselves at the Shamana Spa for a truly rejuvenating experience.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/india/grand-hyatt-goa/goagh" class="btn btn-primary">Check out</a>
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
