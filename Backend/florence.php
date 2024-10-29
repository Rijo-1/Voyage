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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">FLORENCE</h1>
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
                        <img class="d-block w-100" src="./flo1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./flo2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./flo3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./flo4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./flo5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./flo6.png" alt="Third slide">
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
                    <p>Florence, the cradle of the Renaissance, enchants visitors with its timeless beauty and cultural richness. The cityscape is adorned with architectural marvels like the iconic Duomo and the graceful Ponte Vecchio, while world-class museums such as the Uffizi Gallery house masterpieces by Michelangelo, Leonardo da Vinci, and Botticelli. The streets are alive with the aroma of freshly brewed espresso and the chatter of locals and tourists alike, creating a vibrant atmosphere that beckons exploration. As you wander through Florence's labyrinthine alleys, you'll encounter charming piazzas, bustling markets, and hidden artisan workshops where centuries-old traditions thrive. Each corner reveals a new treasure, whether it's a hidden fresco in a church or a cozy trattoria serving up authentic Tuscan cuisine. With its rich history, artistic legacy, and warm hospitality, Florence is a city that captivates the heart and soul, leaving an indelible mark on all who visit.



                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Florence:</p>
                    <ul>
                        <li>
                            <b>Uffizi Gallery:</b>
                            <p>Immerse yourself in the world of Renaissance art at the Uffizi Gallery, home to masterpieces by Michelangelo, Leonardo da Vinci, Botticelli, and more. Explore its vast collections spanning centuries of artistic achievement.</p>
                            <p><b>Opening Hours:</b> 8:15 AM to 6:50 PM (closed on Mondays)</p>
                            <p><b>Ticket Price:</b> €20 for adults, discounts available for children and seniors (as of 2022)</p>
                        </li>
                        <li>
                            <b>Florence Cathedral (Duomo):</b>
                            <p>Marvel at the architectural marvels of Florence Cathedral, also known as the Duomo. Climb to the top of Brunelleschi's Dome for panoramic views of the city, and admire Giotto's Bell Tower and the Baptistery's golden doors.</p>
                            <p><b>Opening Hours:</b> 10:00 AM to 4:30 PM (varying by area)</p>
                            <p><b>Ticket Price:</b> Free entry to cathedral, fees for dome climb and other areas</p>
                        </li>
                        <li>
                            <b>Ponte Vecchio:</b>
                            <p>Stroll across the iconic Ponte Vecchio, Florence's oldest bridge spanning the Arno River. Admire its medieval architecture, charming shops, and picturesque views, and discover the vibrant artisan boutiques that line its historic passageway.</p>
                            <p><b>Opening Hours:</b> Always accessible</p>
                            <p><b>Ticket Price:</b> Free entry</p>
                        </li>
                        <li>
                            <b>Accademia Gallery:</b>
                            <p>Encounter Michelangelo's masterpiece, the statue of David, at the Accademia Gallery. Delve into the artist's genius as you admire this iconic sculpture and explore other works of Renaissance art housed within the museum.</p>
                            <p><b>Opening Hours:</b> 8:15 AM to 6:50 PM (closed on Mondays)</p>
                            <p><b>Ticket Price:</b> €16 for adults, discounts available for children and seniors (as of 2022)</p>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Florence, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./florence_hotel1.jpg" class="card-img-top" alt="Florence Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Four Seasons Hotel Firenze</h5>
                                    <p class="card-text">Experience Renaissance luxury and modern comfort at Four Seasons Hotel Firenze, nestled within a former 15th-century palace and convent.
                                        This historic hotel offers opulent accommodations, Michelin-starred dining, and lush gardens.
                                        Guests can explore Florence's artistic treasures, relax by the hotel's outdoor pool, or indulge in spa treatments inspired by traditional Italian rituals.</p>
                                    <a href="https://www.fourseasons.com/florence/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./florence_hotel2.jpg" class="card-img-top" alt="Florence Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Savoy, a Rocco Forte Hotel</h5>
                                    <p class="card-text">Immerse yourself in Florentine elegance and hospitality at Hotel Savoy, a Rocco Forte Hotel, located in the heart of Florence's historic center.
                                        This boutique hotel offers stylish accommodations, gourmet dining options, and personalized service.
                                        Guests can explore Florence's iconic landmarks, shop at nearby boutiques, or simply unwind in the hotel's chic surroundings.</p>
                                    <a href="https://www.roccofortehotels.com/hotels-and-resorts/hotel-savoy/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./florence_hotel3.jpg" class="card-img-top" alt="Florence Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Belmond Villa San Michele</h5>
                                    <p class="card-text">Discover the beauty of Florence from Belmond Villa San Michele, a former Renaissance monastery nestled in the hills of Fiesole.
                                        This luxurious retreat offers elegant accommodations, gourmet dining, and breathtaking views of Florence's skyline.
                                        Guests can relax in the hotel's terraced gardens, take a cooking class with the chef, or explore Florence's cultural treasures with the hotel's expert guides.</p>
                                    <a href="https://www.belmond.com/hotels/europe/italy/florence/belmond-villa-san-michele/" class="btn btn-primary">Check out</a>
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
