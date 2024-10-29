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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">AMALFI</h1>
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
                        <img class="d-block w-100" src="./aml1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./aml2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./aml3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./aml4.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./aml5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./aml6.jpg" alt="Third slide">
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
                    <p>The Amalfi Coast is a slice of paradise nestled along the rugged cliffs of southern Italy, where azure waters meet towering mountains in a breathtaking display of natural beauty. Picturesque villages cling to the cliffsides, their pastel-hued buildings cascading down to the sparkling Mediterranean below. Amalfi, Positano, and Ravello are among the most enchanting destinations, each offering its own unique charm and allure. Whether you're lounging on a sun-drenched beach, exploring ancient cathedrals and historic villas, or hiking along scenic coastal trails, the Amalfi Coast offers endless opportunities for adventure and relaxation. Savor fresh seafood delicacies at seaside trattorias, sip limoncello in sun-drenched piazzas, and lose yourself in the timeless beauty of this idyllic coastal paradise. With its stunning vistas, rich history, and laid-back Mediterranean vibe, the Amalfi Coast is a destination that dreams are made of.

                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in the Amalfi Coast:</p>
<ul>
    <li>
        <b>Amalfi:</b>
        <p>Discover the charming coastal town of Amalfi, nestled between rugged cliffs and the shimmering Mediterranean Sea. Explore its winding streets, historic cathedral, and scenic waterfront, and soak in the laid-back atmosphere of this picturesque seaside destination.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Positano:</b>
        <p>Experience the enchanting beauty of Positano, a colorful cliffside village renowned for its pastel-hued buildings, sandy beaches, and panoramic views. Stroll along its narrow streets lined with boutique shops, cafes, and lemon groves, and bask in the Mediterranean sun.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Ravello:</b>
        <p>Escape to the tranquil hilltop town of Ravello, perched high above the Amalfi Coast with commanding views of the sea below. Explore its elegant villas, lush gardens, and historic churches, and attend concerts and cultural events held in its scenic outdoor venues.</p>
        <p><b>Opening Hours:</b> Always accessible</p>
        <p><b>Ticket Price:</b> Free entry</p>
    </li>
    <li>
        <b>Villa Rufolo:</b>
        <p>Marvel at the beauty of Villa Rufolo, a historic villa in Ravello famed for its stunning gardens and panoramic terraces overlooking the sea. Explore its lush botanicals, Moorish architecture, and vibrant floral displays, and soak in the Mediterranean ambiance.</p>
        <p><b>Opening Hours:</b> 

                    
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
                    <h3 style="color: #228B22;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Amalfi, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./amalfi_hotel1.jpg" class="card-img-top" alt="Amalfi Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Belmond Hotel Caruso</h5>
                                    <p class="card-text">Discover the beauty of the Amalfi Coast at Belmond Hotel Caruso, perched high above the Mediterranean in the town of Ravello.
                                        This historic hotel offers luxurious accommodations, Michelin-starred dining, and breathtaking views of the coastline.
                                        Guests can relax by the infinity pool, stroll through the hotel's gardens, or explore the picturesque villages of the Amalfi Coast.</p>
                                    <a href="https://www.belmond.com/hotels/europe/italy/amalfi-coast/belmond-hotel-caruso/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./amalfi_hotel2.jpg" class="card-img-top" alt="Amalfi Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Santa Caterina</h5>
                                    <p class="card-text">Experience the charm of Amalfi at Hotel Santa Caterina, a family-owned hotel overlooking the azure waters of the Mediterranean Sea.
                                        This luxurious retreat offers elegant rooms, gourmet dining options, and a private beach club.
                                        Guests can relax in the hotel's cliffside gardens, take a dip in the infinity pool, or explore the nearby town of Amalfi.</p>
                                    <a href="https://www.hotelsantacaterina.it/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./amalfi_hotel3.jpg" class="card-img-top" alt="Amalfi Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Grand Hotel Convento di Amalfi</h5>
                                    <p class="card-text">Immerse yourself in history and luxury at Grand Hotel Convento di Amalfi, a former monastery overlooking the Bay of Salerno.
                                        This five-star hotel offers spacious rooms, gourmet dining options, and panoramic views of the Amalfi Coast.
                                        Guests can unwind in the hotel's spa, relax on the sun terrace, or explore the charming streets of Amalfi.</p>
                                    <a href="https://www.booking.com/searchresults.id.html?aid=331509&label=grand-convento-di-amalfi-391Q3Ea5DXHDFlWXQJoFCQS86463757125%3Apl%3Ata%3Ap1%3Ap2925%2C000%3Aac%3Aap%3Aneg%3Afi%3Atikwd-13600790269%3Alp9062058%3Ali%3Adec%3Adm%3Appccp%3DUmFuZG9tSVYkc2RlIyh9YfebvPBbIhsAUil_7bADhHo&highlighted_hotels=186566&redirected=1&city=-110339&hlrd=no_dates&source=hotel&expand_sb=1&keep_landing=1&sid=0db6c3d148e000ec08202affa8ded624" class="btn btn-primary">Check out</a>
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
