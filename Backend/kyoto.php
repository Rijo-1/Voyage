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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">KYOTO</h1>
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
                        <img class="d-block w-100" src="./kyo1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kyo2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kyo3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kyo5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./k6.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kyo4.jpg" alt="Third slide">
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
                    <p>Kyoto, a city steeped in history and culture, invites you to explore its ancient temples, traditional tea houses, and serene gardens. Lose yourself in the narrow streets of Gion, where geishas gracefully glide past wooden machiya houses. Admire the stunning architecture of Kinkaku-ji, the Golden Pavilion, or stroll through the bamboo groves of Arashiyama. With its rich heritage and timeless beauty, Kyoto promises an unforgettable journey through Japan's past and present.
                        <br><br>Immerse yourself in the vibrant colors of Kyoto's autumn foliage or witness the cherry blossoms in full bloom during spring, adding a touch of natural splendor to the city's already enchanting ambiance. Explore the bustling Nishiki Market, where the air is filled with the aroma of freshly prepared street food and the sights of traditional crafts. Whether you're savoring matcha in a traditional tea ceremony or contemplating the serenity of a Zen garden, Kyoto offers a harmonious blend of tradition, innovation, and natural beauty that captivates travelers from around the globe.






                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places in Kyoto:</p>
                    <li>
                        <b>Kiyomizu-dera Temple:</b>
                        <p>A UNESCO World Heritage Site offering breathtaking views of Kyoto from its wooden terrace and showcasing traditional Japanese architecture.</p>
                    </li>
                    <li>
                        <b>Fushimi Inari Taisha:</b>
                        <p>A shrine famous for its thousands of vermillion torii gates, creating a stunning tunnel-like pathway through the forested hills.</p>
                    </li>
                    <li>
                        <b>Arashiyama Bamboo Grove:</b>
                        <p>Wander through towering bamboo stalks in this serene natural wonder, located in the Arashiyama district.</p>
                    </li>
                    <li>
                        <b>Gion District:</b>
                        <p>Experience Kyoto's traditional entertainment district, known for its geisha culture, tea houses, and preserved historic architecture.</p>
                    </li>
                    <li>
                        <b>Nijo Castle:</b>
                        <p>Explore this UNESCO World Heritage Site featuring beautiful gardens, intricate architecture, and the famous nightingale floors.</p>
                    </li>
                    <br><br>
                    <p>Paid Places to Visit in Kyoto:</p>
                    <ul>
                        <li>
                            <b>Gion Corner:</b>
                            <p>Experience traditional Japanese arts such as tea ceremony, flower arranging, and geisha performances.</p>
                            <p><b>Timings:</b> Varies by performance</p>
                            <p><b>Fare Charges:</b> ¥3,500 per person</p>
                        </li>
                        <li>
                            <b>Kinkaku-ji (Golden Pavilion):</b>
                            <p>Admire the stunning golden pavilion set amidst lush gardens, representing classical Japanese architecture.</p>
                            <p><b>Timings:</b> 9:00 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥400 per person</p>
                        </li>
                        <li>
                            <b>Toei Kyoto Studio Park:</b>
                            <p>Step into the world of samurai and ninja at this historical theme park, offering live performances and film sets.</p>
                            <p><b>Timings:</b> 9:00 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥2,200 per person</p>
                        </li>
                        <li>
                            <b>Kyoto Tower:</b>
                            <p>Enjoy panoramic views of the city from the observation deck of this iconic landmark.</p>
                            <p><b>Timings:</b> 9:00 AM to 9:00 PM</p>
                            <p><b>Fare Charges:</b> ¥800 per person</p>
                        </li>
                        <li>
                            <b>Kyoto International Manga Museum:</b>
                            <p>Explore the world's largest collection of manga at this unique museum, showcasing the history and cultural significance of Japanese comics.</p>
                            <p><b>Timings:</b> 10:00 AM to 6:00 PM</p>
                            <p><b>Fare Charges:</b> ¥800 per person</p>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Kyoto, we highly recommend these hotels </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./rck.jpg" class="card-img-top" alt="australia">
                                <div class="card-body">
                                    <h5 class="card-title">The Ritz-Carlton Kyoto</h5>
                                    <p class="card-text">Experience unparalleled luxury at The Ritz-Carlton Kyoto, where traditional Japanese aesthetics blend seamlessly with modern sophistication. Nestled along the banks of the Kamogawa River, this exquisite hotel offers stunning views, impeccable service, and world-class amenities.</p>
                                    <a href="https://www.ritzcarlton.com/en/hotels/ukyrz-the-ritz-carlton-kyoto/overview/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./hyatt.jpg" class="card-img-top" alt="brazil">
                                <div class="card-body">
                                    <h5 class="card-title">Hyatt Regency Kyoto</h5>
                                    <p class="card-text">Discover a sanctuary of serenity at the Hyatt Regency Kyoto, where traditional Japanese hospitality meets contemporary comfort. Located in the historic Higashiyama district, this elegant hotel offers stylish rooms, authentic dining experiences, and easy access to Kyoto's cultural treasures.</p>
                                    <a href="https://www.hyatt.com/hyatt-regency/en-US/kyoto-hyatt-regency-kyoto" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./hotelgranvia.jpg" class="card-img-top" alt="Canada">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Granvia Kyoto</h5>
                                    <p class="card-text">Enjoy modern comfort and convenience at Hotel Granvia Kyoto, situated atop Kyoto Station. With sleek accommodations, multiple dining options, and panoramic city views, this centrally located hotel provides the perfect base for exploring the city's vibrant culture and heritage..</p>
                                    <a href="https://www.granviakyoto.com/" class="btn btn-primary">Check out</a>
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
