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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">ROME</h1>
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
                        <img class="d-block w-100" src="./rom1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./rom2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./rom3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./rom4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./rom5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./rom6.jpg" alt="Third slide">
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
                    <p>Rome, the eternal city, effortlessly marries ancient grandeur with modern vitality. Steeped in over two millennia of history, it stands as a living testament to the triumphs and tribulations of civilization. From the iconic Colosseum, where the echoes of gladiatorial combat still linger, to the majestic Vatican City, home to the spiritual heart of Catholicism, Rome is a treasure trove of architectural marvels and cultural heritage. Wandering through its labyrinthine streets, one encounters remnants of its imperial past juxtaposed with vibrant piazzas bustling with life. Yet, amidst the tangible echoes of antiquity, Rome pulsates with a dynamic energy, with bustling cafes, designer boutiques, and thriving neighborhoods offering a contemporary allure. It's a city where the past and present intertwine, creating an unforgettable tapestry of sights, sounds, and sensations that captivate the soul of every visitor.


                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Rome:</p>
<ul>
    <li>
        <b>Colosseum:</b>
        <p>Explore the iconic Colosseum, an ancient amphitheater that once hosted gladiatorial contests and grand spectacles. Marvel at its imposing architecture and delve into the history of ancient Rome as you wander through its ancient corridors and tiers.</p>
        <p><b>Opening Hours:</b> 8:30 AM to 7:00 PM (varying seasonally)</p>
        <p><b>Ticket Price:</b> €16 for adults, free for children under 18 (as of 2022)</p>
    </li>
    <li>
        <b>Vatican City:</b>
        <p>Immerse yourself in the spiritual and artistic wonders of Vatican City, the smallest independent state in the world and the center of Catholicism. Visit St. Peter's Basilica, Michelangelo's masterpiece, the Sistine Chapel, and explore the Vatican Museums' vast collections of art and artifacts.</p>
        <p><b>Opening Hours:</b> Varies by attraction</p>
        <p><b>Ticket Price:</b> €17 for Vatican Museums and Sistine Chapel (as of 2022)</p>
    </li>
    <li>
        <b>Pantheon:</b>
        <p>Step back in time at the Pantheon, a marvel of ancient Roman engineering and architecture. Admire its magnificent dome, the largest unreinforced concrete dome in the world, and soak in the ambiance of this well-preserved ancient temple turned church.</p>
        <p><b>Opening Hours:</b> 9:00 AM to 7:30 PM (Monday-Saturday), 9:00 AM to 6:00 PM (Sunday)</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Trevi Fountain:</b>
        <p>Experience the magic of the Trevi Fountain, one of Rome's most famous landmarks and a masterpiece of Baroque art. Toss a coin into its waters to ensure your return to Rome and marvel at the intricate sculptures and cascading waters of this enchanting fountain.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Roman Forum:</b>
        <p>Step into the heart of ancient Rome at the Roman Forum, once the bustling center of political, religious, and commercial life. Wander among the ruins of temples, basilicas, and government buildings, and imagine the city's vibrant past as you explore this archaeological treasure.</p>
        <p><b>Opening Hours:</b> 8:30 AM to 7:00 PM (varying seasonally)</p>
        <p><b>Ticket Price:</b> €16 for adults, free for children under 18 (as of 2022)</p>
    </li>
    <li>
        <b>Piazza Navona:</b>
        <p>Experience the charm of Piazza Navona, one of Rome's most beautiful squares, adorned with elegant Baroque fountains and surrounded by cafes, restaurants, and street performers. Admire Bernini's Fountain of the Four Rivers and soak in the lively atmosphere of this historic gathering place.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
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
                    <h3 style="color: #CD5C5C;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Rome, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./rome_hotel1.webp" class="card-img-top" alt="Rome Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Hassler Roma</h5>
                                    <p class="card-text">Experience timeless elegance and unparalleled views of Rome from Hotel Hassler Roma, located atop the Spanish Steps.
                                        This luxury hotel offers exquisite accommodations, Michelin-starred dining, and personalized service.
                                        Guests can explore Rome's iconic landmarks or simply relax in the hotel's opulent surroundings.</p>
                                    <a href="https://www.hotelhasslerroma.com/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./rome_hotel2.jpg" class="card-img-top" alt="Rome Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Eden</h5>
                                    <p class="card-text">Indulge in luxury and sophistication at Hotel Eden, located near the Villa Borghese gardens.
                                        This historic hotel offers elegant rooms, fine dining experiences, and panoramic views of Rome's skyline.
                                        Guests can immerse themselves in Rome's culture and history while enjoying the hotel's impeccable service and amenities.</p>
                                    <a href="https://www.dorchestercollection.com/en/rome/hotel-eden/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./rome_hotel3.jpg" class="card-img-top" alt="Rome Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel de Russie, a Rocco Forte Hotel</h5>
                                    <p class="card-text">Discover refined luxury and modern amenities at Hotel de Russie, a Rocco Forte Hotel, located between Piazza del Popolo and the Spanish Steps.
                                        This elegant hotel offers spacious rooms, lush gardens, and exquisite dining options.
                                        Guests can explore Rome's vibrant neighborhoods or unwind in the hotel's serene oasis amidst the bustling city.</p>
                                    <a href="https://www.roccofortehotels.com/hotels-and-resorts/hotel-de-russie/" class="btn btn-primary">Check out</a>
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
