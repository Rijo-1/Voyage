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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">TOKYO</h1>
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
                        <img class="d-block w-100" src="./ttnn.webp" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./t1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./t3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./t4.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./t5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./t6.webp" alt="Third slide">
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
                    <p>Tokyo beckons as an enchanting destination brimming with unparalleled experiences. This dynamic city captivates travelers with its vibrant street life, awe-inspiring architecture, and rich cultural tapestry. Explore the bustling markets of Tsukiji or immerse yourself in the electric atmosphere of Akihabara's anime culture. Wander through serene gardens, marvel at iconic landmarks like the Tokyo Tower, and indulge in a culinary adventure through the city's diverse dining scene. Tokyo promises an unforgettable journey where tradition meets innovation, making it a must-visit destination for any traveler.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting few places in Tokyo:</p>
                    <li>
                    <b>Senso-ji Temple:</b>
                    
                        Tokyo's oldest and most significant Buddhist temple located in Asakusa.

                    </li>
                    <li>
                    <b>Tokyo Skytree:</b>

                     
    Iconic tower offering panoramic views of the city from its observation decks.
</li>
<li>
<b>Shibuya Crossing:</b>


    Famous intersection in Shibuya known for its bustling pedestrian scramble.
</li>
<li>
<b>Meiji Shrine:</b>

    Peaceful Shinto shrine surrounded by a lush forest in the heart of Tokyo.
</li>
<li>
<b>Fish Market:</b> 


    Former fish market known for its vibrant atmosphere and fresh seafood.
</li>
<br><br>
Paid Places to Visit in Tokyo <br><br>
    <ul>
        <li>
            <b>Ginza</b>
            <p>
                Upscale shopping district known for its luxury boutiques, department stores, and art galleries.
            </p>
            <p><b>Timings:</b> Stores generally open from 10:00 AM to 8:00 PM</p>
            <p><b>Fare Charges:</b> Varies based on purchases</p>
        </li>
        <li>
           <b> Odaiba</b>
            <p>
                Artificial island in Tokyo Bay offering entertainment complexes, shopping malls, and scenic views of the city skyline.
            </p>
            <p><b>Timings:</b> Varies by attraction</p>
            <p><b>Fare Charges:</b> Varies by attraction</p>
        </li>
        <li>
            <b>Tokyo Disneyland</b>
            <p>
                Magical theme park featuring Disney characters, thrilling rides, and live entertainment.
            </p>
            <p><b>Timings:</b> Typically from 8:00 AM to 10:00 PM</p>
            <p><b>Fare Charges:</b> ¥8,200 for adults, ¥4,900 for children (1-day pass)</p>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Tokyo, we highly recommend these hotels </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./ta2.webp" class="card-img-top" alt="australia">
                                <div class="card-body">
                                    <h5 class="card-title">Park Hyatt Tokyo</h5>
                                    <p class="card-text">Perched high above the bustling city, Park Hyatt Tokyo offers a sanctuary of luxury and tranquility. With spacious rooms boasting panoramic views, Michelin-starred dining experiences, and impeccable service, every moment is tailored to exceed your expectations.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/japan/park-hyatt-tokyo/tyoph" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./ta11.jpg" class="card-img-top" alt="brazil">
                                <div class="card-body">
                                    <h5 class="card-title">The Peninsula Tokyo</h5>
                                    <p class="card-text">From its prestigious location in Marunouchi to its impeccable service and exquisite design, The Peninsula Tokyo epitomizes refined luxury. Experience unparalleled comfort in elegantly appointed rooms and suites, Indulge your palate with a culinary journey through the hotel's award-winning restaurants, or unwind with a rejuvenating spa treatment. </p>
                                    <a href="https://www.peninsula.com/en/tokyo/5-star-luxury-hotel-ginza" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./mad.jpg" class="card-img-top" alt="Canada">
                                <div class="card-body">
                                    <h5 class="card-title">Mandarin Oriental Tokyo</h5>
                                    <p class="card-text">Rising high above the bustling streets of Tokyo, Mandarin Oriental Tokyo offers a haven of elegance and serenity. From the moment you step into the opulent lobby, you'll be greeted by unparalleled luxury and attention to detail. </p>
                                    <a href="https://www.mandarinoriental.com/en/tokyo/nihonbashi?src=ps.brand.motyo.ggl&gad_source=1&gclid=CjwKCAjw9cCyBhBzEiwAJTUWNb8SV4ZQaySpsJR4aXQvwJ7NyUHecWl0Hr52SRZnIIkf1iwDSqJV4BoCIr0QAvD_BwE&gclsrc=aw.ds" class="btn btn-primary">Check out</a>
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
