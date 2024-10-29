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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">OSAKA</h1>
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
                        <img class="d-block w-100" src="./OSK.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./OSK2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./osk3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./osk4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./osk5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./osk6.jpg" alt="Third slide">
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
                    <p>"Osaka, Japan's second-largest city, pulsates with energy and offers a kaleidoscope of experiences for travelers. Known as the 'Kitchen of Japan,' Osaka boasts a culinary scene that's second to none, with street food stalls, bustling markets, and Michelin-starred restaurants offering a gastronomic adventure. Beyond food, Osaka entices visitors with its vibrant nightlife, iconic landmarks such as Osaka Castle and the Umeda Sky Building, and cultural attractions like the historic Shitennoji Temple.
<br><br>
                        Delve deeper into Osaka's rich history by wandering through the historic streets of Shinsekai or exploring the Osaka Museum of History, where interactive exhibits chronicle the city's past. For entertainment, head to Universal Studios Japan for thrilling rides and immersive experiences. And don't miss the Osaka Bay Area, home to the towering Tempozan Ferris Wheel and the Osaka Aquarium Kaiyukan, where you can marvel at diverse marine life. Whether you're captivated by the city's modernity or enchanted by its timeless traditions, Osaka promises an unforgettable journey filled with excitement, flavor, and cultural richness."



                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places in Osaka:</p>
<li>
    <b>Osaka Castle:</b>
    <p>Explore the majestic Osaka Castle, a symbol of Japan's power and prestige, surrounded by expansive gardens and offering panoramic views of the city.</p>
</li>
<li>
    <b>Dotonbori:</b>
    <p>Experience the vibrant nightlife and delicious street food of Dotonbori, with its iconic neon signs, bustling entertainment district, and the famous Glico Running Man billboard.</p>
</li>
<li>
    <b>Shinsaibashi Shopping Arcade:</b>
    <p>Shop 'til you drop at Shinsaibashi, one of Osaka's oldest and busiest shopping streets, featuring a wide array of boutiques, department stores, and souvenir shops.</p>
</li>
<li>
    <b>Osaka Aquarium Kaiyukan:</b>
    <p>Discover the wonders of the ocean at Osaka Aquarium Kaiyukan, one of the largest aquariums in the world, featuring a spectacular central tank with diverse marine life.</p>
</li>
<li>
    <b>Umeda Sky Building:</b>
    <p>Marvel at the futuristic architecture of the Umeda Sky Building, offering breathtaking views of Osaka from its observation deck, known as the "Floating Garden Observatory."</p>
</li>
<br><br>
<p>Paid Places to Visit in Osaka:</p>
<ul>
    <li>
        <b>Universal Studios Japan:</b>
        <p>Experience the magic of Universal Studios Japan, featuring thrilling rides, immersive attractions, and beloved characters from popular movies and TV shows.</p>
        <p><b>Timings:</b> 9:00 AM to 9:00 PM</p>
        <p><b>Fare Charges:</b> ¥8,200 for adults, ¥5,800 for children (1-day pass)</p>
    </li>
    <li>
        <b>Osaka Castle Museum:</b>
        <p>Learn about the history and legacy of Osaka Castle at the museum located within its walls, featuring exhibitions on samurai culture, feudal Japan, and the castle's reconstruction.</p>
        <p><b>Timings:</b> 9:00 AM to 5:00 PM</p>
        <p><b>Fare Charges:</b> ¥600 per person</p>
    </li>
    <li>
        <b>Osaka Bay Area:</b>
        <p>Explore the Osaka Bay Area, home to attractions such as the Tempozan Ferris Wheel, Osaka Maritime Museum, and the Suntory Museum of Art, offering a diverse range of cultural and entertainment experiences.</p>
        <p><b>Timings:</b> Varies by attraction</p>
        <p><b>Fare Charges:</b> Varies by attraction</p>
    </li>
    <li>
        <b>Shitennoji Temple:</b>
        <p>Visit one of Japan's oldest temples, Shitennoji Temple, founded in the 6th century and featuring a five-story pagoda, beautiful gardens, and a vibrant market selling Buddhist artifacts and souvenirs.</p>
        <p><b>Timings:</b> 8:30 AM to 4:30 PM</p>
        <p><b>Fare Charges:</b> ¥300 per person</p>
    </li>
    <li>
        <b>Osaka Museum of History:</b>
        <p>Delve into Osaka's past at the Osaka Museum of History, featuring interactive exhibits, multimedia displays, and panoramic views of the city skyline from its observation deck.</p>
        <p><b>Timings:</b> 9:30 AM to 5:00 PM</p>
        <p><b>Fare Charges:</b> ¥600 per person</p>
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
            
                <div class="recommendation">
                    <h3 style="color: red;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Yokohama, we highly recommend these hotels </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./swiss.webp" class="card-img-top" alt="australia">
                                <div class="card-body">
                                    <h5 class="card-title">Swissotel Nankai Osaka</h5>
                                    <p class="card-text">Situated atop Namba Station, Swissotel Nankai Osaka offers luxurious accommodations and unparalleled convenience.
                                        The hotel features spacious rooms with stunning city views, multiple dining options including a Michelin-starred restaurant, and state-of-the-art facilities such as a fitness center and rooftop pool.</p>
                                    <a href="https://www.swissotel.com/hotels/nankai-osaka/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./io.jpg" class="card-img-top" alt="brazil">
                                <div class="card-body">
                                    <h5 class="card-title">InterContinental Osaka</h5>
                                    <p class="card-text">Experience luxury and elegance at the InterContinental Osaka, located in the heart of the city's vibrant Umeda district.
                                        This five-star hotel offers spacious rooms with modern amenities, gourmet dining options, and panoramic views of Osaka's skyline.</p>
                                    <a href="https://www.hyatt.com/hyatt-regency/en-US/kyoto-hyatt-regency-kyoto" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./mg.jpg" class="card-img-top" alt="Canada">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Monterey Grasmere Osaka</h5>
                                    <p class="card-text">Nestled near Namba Station, Hotel Monterey Grasmere Osaka blends European elegance with Japanese hospitality.
                                        Guests can choose from a range of stylish rooms, dine at the hotel's Italian restaurant, and enjoy easy access to shopping and entertainment in the bustling Namba district.</p>
                                    <a href="https://www.hotelmonterey.co.jp/en/osaka/" class="btn btn-primary">Check out</a>
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
