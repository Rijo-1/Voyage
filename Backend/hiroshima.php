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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">HIROSHIMA</h1>
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
                        <img class="d-block w-100" src="./h6.avif" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./h2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./h3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./h4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./h5.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./h1.jpg" alt="Third slide">
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
                    <p>Hiroshima, a city with a resilient spirit, beckons visitors with its profound history and vibrant present. At its heart lies the Peace Memorial Park, a poignant tribute to the devastating atomic bombing during World War II, offering somber reflections amidst lush greenery and tranquil waterways. Delve into the city's past at the Hiroshima Peace Memorial Museum, where exhibits narrate the harrowing events of that fateful day, fostering a deep sense of remembrance and hope for peace.
<br><br>
                        Beyond its tragic history, Hiroshima blossoms with cultural richness and natural beauty. Wander through the picturesque Shukkeien Garden, a serene oasis teeming with cherry blossoms and traditional tea houses, or explore the bustling streets of Hondori Arcade, brimming with shops, eateries, and lively entertainment. Indulge in Hiroshima's culinary delights, including the renowned okonomiyaki, savory pancake layered with fresh ingredients, or savor the city's famous oysters harvested from the nearby Seto Inland Sea. With its blend of resilience, culture, and natural splendor, Hiroshima offers an unforgettable journey of reflection, discovery, and renewal.



                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places in Hiroshima:</p>
                    <li>
                        <b>Hiroshima Peace Memorial Park:</b>
                        <p>Explore the poignant Hiroshima Peace Memorial Park, a tribute to the atomic bombing. Visit the Peace Memorial Museum and reflect at the Atomic Bomb Dome, a UNESCO World Heritage Site.</p>
                    </li>
                    <li>
                        <b>Miyajima Island:</b>
                        <p>Escape to Miyajima Island, famed for its floating torii gate and Itsukushima Shrine. Wander the charming streets, encounter deer, and enjoy local delicacies like grilled oysters.</p>
                    </li>
                    <li>
                        <b>Hiroshima Castle:</b>
                        <p>Discover Hiroshima Castle, a symbol of resilience. Climb for city views and explore the museum showcasing the castle's history.</p>
                    </li>
                    <li>
                        <b>Shukkeien Garden:</b>
                        <p>Find serenity at Shukkeien Garden, a 17th-century oasis. Enjoy lush landscapes, ponds, and tea houses.</p>
                    </li>
                    <li>
                        <b>Hiroshima Museum of Art:</b>
                        <p>Immerse in art at the Hiroshima Museum of Art, housing Japanese and Western masterpieces.</p>
                    </li>
                    <br><br>
                    <p>Paid Places to Visit in Hiroshima:</p>
                    <ul>
                        <li>
                            <b>Hiroshima Orizuru Tower:</b>
                            <p>Visit Hiroshima Orizuru Tower for city and sea views. Engage in exhibits, fold paper cranes, and dine with a view.</p>
                        </li>
                        <li>
                            <b>Hiroshima National Peace Memorial Hall:</b>
                            <p>Honor the atomic bombing victims at the Hiroshima National Peace Memorial Hall. Experience exhibits and a reflection room.</p>
                        </li>
                        <li>
                            <b>Hiroshima Children's Museum:</b>
                            <p>Inspire kids at the Hiroshima Children's Museum with hands-on exhibits and creative activities.</p>
                        </li>
                        <li>
                            <b>Hiroshima City Asa Zoological Park:</b>
                            <p>Explore the Hiroshima City Asa Zoological Park, featuring diverse wildlife in natural habitats.</p>
                        </li>
                        <li>
                            <b>Hiroshima Bay Cruise:</b>
                            <p>Enjoy a scenic Hiroshima Bay Cruise for city and island views, offering various tour options.</p>
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
                    <h3 style="color: green;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Hiroshima, we highly recommend these hotels:</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./spahotel.avif" class="card-img-top" alt="Hiroshima Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Sheraton Grand Hiroshima Hotel</h5>
                                    <p class="card-text">Enjoy a luxurious stay at the Sheraton Grand Hiroshima Hotel, conveniently located in the city center.
                                        This hotel offers spacious and elegantly furnished rooms, exquisite dining options, and top-notch amenities including a rooftop pool and fitness center.
                                        Guests can also explore nearby attractions such as the Hiroshima Peace Memorial Park and Hiroshima Castle.</p>
                                    <a href="https://www.marriott.com/hotels/travel/hijsi-sheraton-grand-hiroshima-hotel/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./ana.avif" class="card-img-top" alt="Hiroshima Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">ANA Crowne Plaza Hiroshima</h5>
                                    <p class="card-text">Experience comfort and convenience at the ANA Crowne Plaza Hiroshima, situated near the city's main attractions.
                                        Guests can relax in well-appointed rooms with modern amenities, dine at the hotel's restaurants serving a variety of cuisines, and unwind at the rooftop bar offering panoramic views of Hiroshima.
                                        The hotel also provides easy access to Hiroshima Peace Memorial Park and the Atomic Bomb Dome.</p>
                                    <a href="https://www.ihg.com/crowneplaza/hotels/us/en/hiroshima/hijja/hoteldetail" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./granvia.jpg" class="card-img-top" alt="Hiroshima Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Granvia Hiroshima</h5>
                                    <p class="card-text">Located adjacent to Hiroshima Station, Hotel Granvia Hiroshima offers modern accommodations and easy access to transportation.
                                        Guests can enjoy comfortable rooms with city views, dine at the hotel's restaurants offering a blend of Japanese and international cuisine, and relax at the rooftop terrace.
                                        The hotel's central location makes it a perfect base for exploring Hiroshima's attractions including Hiroshima Peace Memorial Park and Miyajima Island.</p>
                                    <a href="https://www.hgh.co.jp/english/"class="btn btn-primary" >Check out</a>
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
