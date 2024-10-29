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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">NAPLES</h1>
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
                        <img class="d-block w-100" src="./nap1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./nap6.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./nap3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./nap4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./nap5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./nap2.jpg" alt="Third slide">
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
                    <p>Naples, a city of contrasts and contradictions, is a captivating blend of ancient history and vibrant modernity. Its streets are alive with the hustle and bustle of everyday life, where the aroma of freshly baked pizza mingles with the salty sea breeze from the Bay of Naples. The city's rich heritage is on display at every turn, from the imposing Castel Nuovo to the ancient ruins of Pompeii and Herculaneum, reminders of its storied past as a center of Greek and Roman civilization. Yet Naples is also a city of innovation and creativity, with a thriving contemporary art scene and a dynamic culinary landscape that celebrates its culinary heritage while embracing new flavors and influences. Whether you're exploring the narrow alleys of the historic center or savoring a leisurely espresso at a sidewalk cafe, Naples never fails to captivate with its infectious energy and unmistakable charm.


                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Naples:</p>
<ul>
    <li>
        <b>Pompeii:</b>
        <p>Step back in time at the ancient city of Pompeii, buried beneath layers of volcanic ash after the eruption of Mount Vesuvius in 79 AD. Explore its remarkably preserved ruins, including temples, villas, and amphitheaters, and glimpse daily life in the Roman Empire.</p>
        <p><b>Opening Hours:</b> 9:00 AM to 7:30 PM (varying seasonally)</p>
        <p><b>Ticket Price:</b> €16 for adults, discounts available for children and seniors (as of 2022)</p>
    </li>
    <li>
        <b>Naples National Archaeological Museum:</b>
        <p>Discover the rich history of Naples and the surrounding region at the National Archaeological Museum. Marvel at its vast collections of artifacts, sculptures, and treasures, including artifacts from Pompeii and Herculaneum.</p>
        <p><b>Opening Hours:</b> 9:00 AM to 7:30 PM (closed on Tuesdays)</p>
        <p><b>Ticket Price:</b> €18 for adults, discounts available for children and seniors (as of 2022)</p>
    </li>
    <li>
        <b>Mount Vesuvius:</b>
        <p>Embark on a thrilling adventure to the summit of Mount Vesuvius, the volcano that famously destroyed Pompeii and Herculaneum. Hike to the crater rim for breathtaking views of the Bay of Naples and the surrounding countryside.</p>
        <p><b>Opening Hours:</b> 9:00 AM to 3:00 PM (weather permitting)</p>
        <p><b>Ticket Price:</b> €10 for adults, discounts available for children and seniors (as of 2022)</p>
    </li>
    <li>
        <b>Naples Underground:</b>
        <p>Explore the hidden depths of Naples with a tour of the city's underground tunnels and catacombs. Discover ancient aqueducts, Roman theaters, and hidden chambers beneath the bustling streets, offering a glimpse into Naples' fascinating history.</p>
        <p><b>Opening Hours:</b> Tours available throughout the day</p>
        <p><b>Ticket Price:</b> €10-€15 per person (depending on tour package)</p>
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
                    <h3 style="color: #FF4500;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Naples, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./naples_hotel1.jpg" class="card-img-top" alt="Naples Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Grand Hotel Vesuvio</h5>
                                    <p class="card-text">Experience timeless elegance and breathtaking views of the Bay of Naples at Grand Hotel Vesuvio, located along the waterfront promenade.
                                        This historic hotel offers luxurious accommodations, gourmet dining options, and impeccable service.
                                        Guests can explore Naples' historic center, visit nearby attractions such as Pompeii and Mount Vesuvius, or simply relax in the hotel's opulent surroundings.</p>
                                    <a href="https://www.vesuvio.it/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./naples_hotel2.jpg" class="card-img-top" alt="Naples Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Eurostars Hotel Excelsior</h5>
                                    <p class="card-text">Indulge in luxury and sophistication at Eurostars Hotel Excelsior, located on the picturesque waterfront of Naples.
                                        This five-star hotel offers elegant accommodations, gourmet dining options, and panoramic views of the Mediterranean Sea.
                                        Guests can explore Naples' historic landmarks, relax on the hotel's rooftop terrace, or indulge in spa treatments overlooking the sea.</p>
                                    <a href="https://www.eurostarshotels.co.uk/eurostars-hotel-excelsior.html" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./naples_hotel3.jpg" class="card-img-top" alt="Naples Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Romeo Hotel</h5>
                                    <p class="card-text">Discover contemporary luxury and innovative design at Romeo Hotel, located near Naples' historic center.
                                        This design hotel offers stylish accommodations, Michelin-starred dining, and panoramic views of the city and Mount Vesuvius.
                                        Guests can explore Naples' vibrant street life, visit nearby archaeological sites, or unwind in the hotel's rooftop pool and spa.</p>
                                    <a href="https://www.romeohotel.it/" class="btn btn-primary">Check out</a>
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