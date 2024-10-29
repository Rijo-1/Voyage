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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">JAIPUR</h1>
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
                        <img class="d-block w-100" src="./jai1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./jai2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./jai3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./jai4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./jai5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./jai6.jpg" alt="Third slide">
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
                    <p>Jaipur, the vibrant capital of Rajasthan, India, is a captivating blend of history, culture, and architectural grandeur. Known as the "Pink City" due to its iconic pink sandstone buildings, Jaipur mesmerizes visitors with its majestic forts, opulent palaces, and bustling bazaars. The city is a treasure trove of heritage, boasting landmarks like the magnificent Amer Fort, the intricately designed City Palace, and the iconic Hawa Mahal. Explore the narrow lanes of the old city, brimming with colorful markets offering traditional textiles, handicrafts, and delectable street food. Whether it's immersing oneself in the royal past at the Jal Mahal or witnessing the celestial beauty of the Jantar Mantar observatory, Jaipur promises an unforgettable experience that resonates with the rich tapestry of Indian history and culture.



                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places in Jaipur:</p>
<li>
    <b>Hawa Mahal:</b>
    <p>Also known as the "Palace of Winds," this iconic landmark features a unique honeycomb façade and offers a peek into the city's architectural splendor.</p>
</li>
<li>
    <b>Jal Mahal:</b>
    <p> Situated amidst the Man Sagar Lake, Jal Mahal, or the Water Palace, is an architectural marvel of Rajputana craftsmanship. Its unique location partially submerged in water provides a picturesque setting, making it a popular spot for photography and serene walks.</p>
</li>
<li>
    <b>City Palace:</b>
    <p> A grand complex of palaces, courtyards, and museums showcasing Jaipur's regal history, with exquisite Rajput and Mughal architecture.
 </p>
</li>
<li>
    <b>Amer Fort:</b>
    <p>A stunning hilltop fortress with intricate architecture, offering captivating views and a glimpse into Rajasthan's royal heritage.</p>
</li>
<li>
    <b>Jantar Mantar:</b>
    <p>An impressive astronomical observatory dating back to the 18th century, housing a collection of architectural astronomical instruments and offering insights into ancient Indian astronomy.

    </p>
</li>
<br><br>
<p>Here are some activities to enjoy in Jaipur:</p>
<ul>
    <li>
        <b>Elephant Ride at Amer Fort:</b>
        <p>Experience royalty with an elephant ride up the cobbled path to the Amer Fort, adding a touch of regal charm to your visit.</p>
    </li>
    <li>
        <b>Attend a Cultural Show:</b>
        <p>Immerse yourself in the rich Rajasthani culture by attending a vibrant cultural show featuring folk music, dance performances, and puppet shows, offering a glimpse into the region's traditions.</p>
    </li>
    <li>
        <b>Hot Air Balloon Ride:</b>
        <p>Soar above the Pink City and witness its architectural wonders from a bird's eye view with a thrilling hot air balloon ride, providing a unique perspective of Jaipur's landmarks.</p>
    </li>
    <li>
        <b>Culinary Tour:</b>
        <p>Embark on a culinary journey through Jaipur's aromatic streets, savoring local delicacies like Rajasthani thali, spicy chaats, and mouthwatering sweets, offering a gastronomic delight for food enthusiasts.</p>
    </li>
    <li>
        <b>Camel Safari:</b>
        <p>Explore the rustic beauty of Rajasthan's countryside with a camel safari, traversing through sandy dunes and rural villages, experiencing the tranquility of the desert landscape.</p>
    </li>
    <li>
        <b>Shopping Expedition:</b>
        <p>Indulge in a shopping spree at Jaipur's bustling markets, renowned for their exquisite handicrafts, jewelry, textiles, and traditional artifacts, offering a perfect opportunity for souvenir hunting and retail therapy.</p>
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
                    <h3 style="color: coral;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Jaipur, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./jaipur_hotel1.jpg" class="card-img-top" alt="Jaipur Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Rambagh Palace, Jaipur</h5>
                                    <p class="card-text">Step into royal grandeur at Rambagh Palace, Jaipur, once the residence of Maharaja Sawai Man Singh II.
                                        This majestic hotel offers opulent rooms, fine dining experiences, and impeccable service.
                                        Guests can explore the hotel's lush gardens, relax by the poolside, or indulge in spa treatments fit for royalty.</p>
                                    <a href="https://www.tajhotels.com/en-in/hotels/rambagh-palace-jaipur?gad_source=1&gclid=EAIaIQobChMIiumzm4KuhgMVKaRmAh3RzQuyEAAYASAAEgIXJvD_BwE&gclsrc=aw.ds" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./jaipur_hotel2.jpg" class="card-img-top" alt="Jaipur Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">The Oberoi Rajvilas, Jaipur</h5>
                                    <p class="card-text">Experience luxury and tranquility at The Oberoi Rajvilas, Jaipur, set amidst 32 acres of landscaped gardens.
                                        This resort offers luxurious accommodations, fine dining options, and rejuvenating spa experiences.
                                        Guests can also participate in cultural activities such as yoga sessions and traditional Rajasthani performances.</p>
                                    <a href="https://www.oberoihotels.com/hotels-in-jaipur-rajvilas-resort/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./jaipur_hotel3.jpg" class="card-img-top" alt="Jaipur Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">ITC Rajputana, Jaipur</h5>
                                    <p class="card-text">Experience the rich heritage of Rajasthan at ITC Rajputana, Jaipur, located in the heart of the Pink City.
                                        This hotel offers spacious rooms, authentic dining experiences, and warm hospitality.
                                        Guests can explore Jaipur's attractions such as Hawa Mahal and City Palace or relax by the hotel's poolside oasis. The hotel also offers cultural experiences such as turban tying and henna painting.</p>
                                    <a href="https://www.itchotels.com/in/en/itcrajputana-jaipur?utm_source=google&utm_medium=cpc&utm_content=search&utm_campaign=HQ-DTL|HTL|Jaipur|ITCRajputana|Search|Conversions|PANIndia|always-on|Owned|LC|GGL|na|na|Leisure|JAILC|Brand&gad_source=1&gclid=EAIaIQobChMI6N7DsYKuhgMVPZRLBR0m9wwDEAAYASAAEgJSrfD_BwE" class="btn btn-primary">Check out</a>
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
