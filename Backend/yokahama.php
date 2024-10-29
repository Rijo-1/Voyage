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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">YOKAHAMA</h1>
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
                        <img class="d-block w-100" src="./y5.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./y2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./y3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./y4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./y6.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./y1.jpg" alt="Third slide">
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
                    <p>"Yokohama, Japan's second-largest city, is a captivating blend of old-world charm and modern innovation. Nestled along Tokyo Bay, this bustling port city boasts a rich maritime history and a vibrant cultural scene. Wander through the picturesque streets of Yokohama's historic district, where charming red-brick warehouses have been transformed into trendy shops, cafes, and galleries. Explore iconic landmarks like the Yokohama Landmark Tower, offering breathtaking views from its observation decks, or stroll through the sprawling grounds of Sankeien Garden, a tranquil oasis amidst the urban landscape. With its eclectic mix of attractions, Yokohama promises an unforgettable journey where tradition meets cosmopolitan flair."
<br><br>
"Beyond its historical sites, Yokohama is a paradise for food enthusiasts, offering a diverse culinary landscape that ranges from traditional Japanese delicacies to international fare. Indulge in a seafood feast at the bustling Yokohama Chinatown, the largest Chinatown in Japan, or savor authentic ramen in one of the city's cozy noodle shops. For a taste of luxury, dine at one of Yokohama's upscale restaurants overlooking the bay, where you can sample fresh sushi while enjoying panoramic views of the city skyline. With its vibrant street food scene and Michelin-starred dining options, Yokohama is a culinary destination not to be missed."







                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places in Yokohama:</p>
                    <li>
                        <b>Yokohama Landmark Tower:</b>
                        <p>Ascend the Yokohama Landmark Tower, one of Japan's tallest buildings, for breathtaking views of the city skyline and Tokyo Bay from its observation deck.</p>
                    </li>
                    <li>
                        <b>Minato Mirai 21:</b>
                        <p>Explore Minato Mirai 21, Yokohama's waterfront district, featuring attractions such as the Cosmo Clock 21 Ferris Wheel, Yokohama Red Brick Warehouse, and Yokohama Cosmo World amusement park.</p>
                    </li>
                    <li>
                        <b>Sankeien Garden:</b>
                        <p>Discover the tranquility of Sankeien Garden, a traditional Japanese garden featuring ponds, tea houses, and historic buildings relocated from across Japan, providing a peaceful escape from the city bustle.</p>
                    </li>
                    <li>
                        <b>Yokohama Chinatown:</b>
                        <p>Immerse yourself in the vibrant atmosphere of Yokohama Chinatown, the largest Chinatown in Japan, known for its bustling streets filled with colorful shops, restaurants, and traditional festivals.</p>
                    </li>
                    <li>
                        <b>Cup Noodles Museum:</b>
                        <p>Unleash your creativity at the Cup Noodles Museum, where you can learn about the history of instant noodles, create your own custom cup noodle, and explore interactive exhibits showcasing the art of noodle-making.</p>
                    </li>
                    <br><br>
                    <p>Paid Places to Visit in Yokohama:</p>
                    <ul>
                        <li>
                            <b>Hakkeijima Sea Paradise:</b>
                            <p>Experience marine life at Hakkeijima Sea Paradise, a theme park and aquarium complex featuring attractions such as underwater tunnels, dolphin shows, and thrilling rides for visitors of all ages.</p>
                            <p><b>Timings:</b> 10:00 AM to 8:00 PM</p>
                            <p><b>Fare Charges:</b> ¥3,200 for adults, ¥1,600 for children (1-day pass)</p>
                        </li>
                        <li>
                            <b>Yokohama Museum of Art:</b>
                            <p>Discover artistic masterpieces at the Yokohama Museum of Art, showcasing a diverse collection of Japanese and international works, as well as rotating exhibitions and educational programs.</p>
                            <p><b>Timings:</b> 10:00 AM to 6:00 PM</p>
                            <p><b>Fare Charges:</b> ¥500 per person</p>
                        </li>
                        <li>
                            <b>Nogeyama Zoo:</b>
                            <p>Visit Nogeyama Zoo, a family-friendly attraction featuring a variety of animals from around the world, as well as picnic areas, playgrounds, and walking trails amidst lush greenery.</p>
                            <p><b>Timings:</b> 9:30 AM to 4:30 PM</p>
                            <p><b>Fare Charges:</b> Free admission</p>
                        </li>
                        <li>
                            <b>Yokohama Anpanman Children's Museum & Mall:</b>
                            <p>Delight in the world of Anpanman at the Yokohama Anpanman Children's Museum & Mall, where kids can explore interactive exhibits, play areas, and themed attractions based on the popular Japanese character.</p>
                            <p><b>Timings:</b> 10:00 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥1,500 for adults, ¥1,000 for children (admission fee)</p>
                        </li>
                        <li>
                            <b>Yokohama Hakkeijima Incidental Facility:</b>
                            <p>Embark on an adventure at Yokohama Hakkeijima Incidental Facility, offering a range of activities such as sea kayaking, paddleboarding, and beach volleyball, as well as dining options and beachfront relaxation.</p>
                            <p><b>Timings:</b> 9:00 AM to 6:00 PM</p>
                            <p><b>Fare Charges:</b> Varies by activity</p>
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
                    <h3 style="color: blue;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Yokohama, we highly recommend these hotels:</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./y1ho.webp" class="card-img-top" alt="Yokohama Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Yokohama Bay Sheraton Hotel & Towers</h5>
                                    <p class="card-text">Perched on the waterfront with breathtaking views of Yokohama Bay, Yokohama Bay Sheraton Hotel & Towers offers unparalleled luxury and convenience.
                                        Guests can enjoy spacious rooms with modern amenities, world-class dining options, and access to a range of recreational facilities including a fitness center and spa.</p>
                                    <a href="https://www.marriott.com/en-us/hotels/tyoys-yokohama-bay-sheraton-hotel-and-towers/overview/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./intercon.avif" class="card-img-top" alt="Yokohama Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">InterContinental Yokohama Grand</h5>
                                    <p class="card-text">Experience unparalleled luxury and sophistication at the InterContinental Yokohama Grand, located in the heart of Yokohama's bustling Minato Mirai district.
                                        This five-star hotel offers elegantly appointed rooms with stunning views of the city skyline or Yokohama Bay, gourmet dining options, and world-class amenities including a rooftop pool and spa.</p>
                                    <a href= "https://www.ihg.com/intercontinental/hotels/us/en/yokohama/yokha/hoteldetail"class= "btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./yroyalpark.jpg" class="card-img-top" alt="Yokohama Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Yokohama Royal Park Hotel</h5>
                                    <p class="card-text">Situated in the iconic Landmark Tower, Yokohama Royal Park Hotel offers guests a luxurious retreat with panoramic views of Yokohama city and beyond.
                                        Guests can indulge in spacious and elegantly appointed rooms, savor gourmet cuisine at the hotel's restaurants, and unwind at the Sky Spa & Fitness Club, offering spectacular views from its 70th-floor perch.</p>
                                    <a href="https://www2.yrph.com/" class="btn btn-primary">Check out</a>
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
