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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">KERALA</h1>
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
                        <img class="d-block w-100" src="./ker1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ker2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ker3new.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ker5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ker6.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ker3.jpg" alt="Third slide">
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
                    <p>Kerala, often referred to as "God's Own Country," is a tropical paradise located on the southwestern coast of India. Blessed with lush greenery, serene backwaters, and pristine beaches, Kerala offers a unique blend of natural beauty, rich culture, and vibrant traditions.

                        The backwaters of Kerala, a network of interconnected lakes, rivers, and canals, are one of its most iconic features. Visitors can embark on houseboat cruises through these tranquil waterways, surrounded by swaying palms and verdant landscapes, providing a glimpse into the laid-back lifestyle of the locals.
                        
                        The hill stations of Munnar and Wayanad offer a refreshing escape with their mist-covered hills, tea plantations, and cascading waterfalls. Adventure enthusiasts can trek through the Western Ghats or indulge in activities like bamboo rafting and wildlife safaris in the lush forests.
                        
                        </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Kerala:</p>
                    <ul>
                        <li>
                            <b>Backwaters of Alleppey:</b>
                            <p>Experience the serene backwaters of Alleppey aboard a traditional houseboat, drifting along tranquil canals fringed by swaying palms and verdant paddy fields. Immerse yourself in the idyllic beauty of Kerala's backwaters, witnessing local life and breathtaking sunsets.</p>
                        </li>
                        <li>
                            <b>Munnar:</b>
                            <p>Explore the picturesque hill station of Munnar, renowned for its lush tea plantations, mist-covered hills, and cascading waterfalls. Trek through verdant forests, visit tea estates, and enjoy panoramic views of the Western Ghats from this scenic paradise.</p>
                        </li>
                        <li>
                            <b>Kerala Backwaters:</b>
                            <p>Cruise through the enchanting Kerala backwaters in Kumarakom, nestled amidst the Vembanad Lake. Glide past serene lagoons, coconut groves, and rustic villages aboard a traditional houseboat, experiencing the tranquility and beauty of Kerala's waterways.</p>
                        </li>
                        <li>
                            <b>Periyar Wildlife Sanctuary:</b>
                            <p>Discover the rich biodiversity of the Periyar Wildlife Sanctuary in Thekkady, home to diverse flora and fauna including elephants, tigers, and exotic bird species. Embark on a jungle safari, boat ride, or nature walk to observe wildlife in their natural habitat.</p>
                        </li>
                        <li>
                            <b>Kovalam Beach:</b>
                            <p>Relax on the golden sands of Kovalam Beach, one of Kerala's most popular coastal destinations. Swim in the turquoise waters, sunbathe on the pristine shore, and indulge in water sports like surfing and parasailing amidst the picturesque setting of palm-fringed shores.</p>
                        </li>
                    </ul>
                    <br><br>
                    <p>Here are some activities to enjoy in Kerala:</p>
                    <ul>
                        <li>
                            <b>Houseboat Stay in Alleppey:</b>
                            <p>Experience the charm of Kerala's backwaters with an overnight stay aboard a traditional houseboat in Alleppey. Enjoy delicious Kerala cuisine, serene views, and starlit nights while drifting along the tranquil waterways.</p>
                        </li>
                        <li>
                            <b>Kathakali Performance:</b>
                            <p>Immerse yourself in the vibrant culture of Kerala with a Kathakali performance, a traditional dance-drama known for its elaborate costumes, intricate makeup, and expressive gestures. Witness captivating storytelling through music, dance, and mythology.</p>
                        </li>
                        <li>
                            <b>Spice Plantation Tour:</b>
                            <p>Embark on a guided tour of a spice plantation in Thekkady and discover the fragrant world of Kerala's spices. Learn about cultivation methods, medicinal properties, and culinary uses of spices like cardamom, pepper, cinnamon, and cloves.</p>
                        </li>
                        <li>
                            <b>Ayurvedic Massage:</b>
                            <p>Rejuvenate your mind and body with an authentic Ayurvedic massage in Kerala, renowned for its therapeutic benefits and holistic healing. Choose from a range of treatments including Abhyanga, Shirodhara, and Panchakarma to unwind and revitalize your senses.</p>
                        </li>
                        <li>
                            <b>Elephant Safari in Periyar:</b>
                            <p>Embark on an exhilarating elephant safari in Periyar Wildlife Sanctuary and explore the dense forests and scenic landscapes atop these majestic creatures. Encounter wildlife in their natural habitat and create unforgettable memories amidst the wilderness of Kerala.</p>
                        </li>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Kerala, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./kerala_h1.jpg" class="card-img-top" alt="Kerala Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Vivanta by Taj - Bekal, Kerala</h5>
                                    <p class="card-text">Escape to a tropical paradise at Vivanta by Taj - Bekal, Kerala, nestled amidst serene backwaters and lush landscapes.
                                        This resort offers luxurious accommodations, world-class dining options, and rejuvenating Ayurvedic spa treatments.
                                        Guests can also enjoy outdoor activities such as boating and nature walks in the picturesque surroundings.</p>
                                    <a href="ajhotels.com/en-in/hotels/taj-bekal-kerala?gad_source=1&gclid=EAIaIQobChMInfy904KuhgMVnaVmAh1R2QgBEAAYASAAEgLr1_D_BwE" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./kerala_hotel2.jpg" class="card-img-top" alt="Kerala Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">The Zuri Kumarakom, Kerala Resort & Spa</h5>
                                    <p class="card-text">Experience luxury and tranquility at The Zuri Kumarakom, Kerala Resort & Spa, located on the shores of Vembanad Lake.
                                        This resort offers spacious villas, fine dining experiences, and holistic wellness treatments at Maya Spa.
                                        Guests can also explore the picturesque backwaters of Kumarakom with boat cruises and fishing trips.</p>
                                    <a href="https://www.thezurihotels.com/lake-resorts-in-kumarakom?gad_source=1" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./kerala_hotel3.jpg" class="card-img-top" alt="Kerala Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Kumarakom Lake Resort, Kerala</h5>
                                    <p class="card-text">Experience the charm of Kerala's backwaters at Kumarakom Lake Resort, set amidst 25 acres of lush greenery.
                                        This resort offers traditional Kerala-style cottages, authentic dining experiences, and Ayurvedic wellness treatments.
                                        Guests can relax by the infinity pool, take a sunset cruise on Vembanad Lake, or participate in cultural activities.</p>
                                    <a href="https://www.kumarakomlakeresort.in/" class="btn btn-primary">Check out</a>
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
