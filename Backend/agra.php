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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">AGRA</h1>
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
                        <img class="d-block w-100" src="./ag1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ag2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ag3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ag.png" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./ag6.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./a4.jpg" alt="Third slide">
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
                    <p>Agra, home to the iconic Taj Mahal, stands as a testament to India's rich history, architectural brilliance, and enduring romance. Stepping into Agra is akin to entering a realm where the grandeur of the Mughal era is preserved in its magnificent monuments and cultural heritage.Agra boasts a wealth of architectural wonders, including the imposing Agra Fort, a UNESCO World Heritage Site that served as the seat of Mughal power for generations, showcasing a fusion of Persian, Turkish, and Indian architectural styles. Explore the intricately carved halls, majestic courtyards, and panoramic views of the Yamuna River from its towering ramparts. Nearby lies the exquisite tomb of Itmad-ud-Daulah, often referred to as the "Baby Taj," with its intricate marble lattice work and serene riverside setting.

                        Immerse yourself in the vibrant culture of Agra as you stroll through its bustling bazaars, where artisans ply their trade and colorful handicrafts beckon. Indulge in the culinary delights of Agra, savoring Mughlai delicacies like succulent kebabs, aromatic biryanis, and delectable sweets that have delighted palates for centuries.
                        
                        </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Agra:</p>
<ul>
    <li>
        <b>Taj Mahal:</b>
        <p>Experience the timeless beauty of the Taj Mahal, a UNESCO World Heritage Site and one of the Seven Wonders of the World, as you marvel at its exquisite marble architecture, intricate inlay work, and captivating reflection pools, symbolizing eternal love and architectural perfection.</p>
    </li>
    <li>
        <b>Agra Fort:</b>
        <p>Explore the majestic Agra Fort, a UNESCO World Heritage Site and former seat of the Mughal Empire, with its imposing red sandstone walls, grand palaces, and intricate marble pavilions, offering panoramic views of the Taj Mahal and the Yamuna River.</p>
    </li>
    <li>
        <b>Fatehpur Sikri:</b>
        <p>Discover the abandoned city of Fatehpur Sikri, a UNESCO World Heritage Site, and marvel at its grand palaces, mosques, and courtyards, built by Emperor Akbar in the 16th century, showcasing exquisite Mughal architecture and historical significance.</p>
    </li>
    <li>
        <b>Itmad-ud-Daulah's Tomb:</b>
        <p>Visit the elegant tomb of Itmad-ud-Daulah, often referred to as the "Baby Taj," and admire its delicate marble lattice work, serene gardens, and tranquil riverside setting, offering a glimpse into Mughal architectural refinement and historical legacy.</p>
    </li>
    <li>
        <b>Moti Masjid:</b>
        <p>Experience the serenity of the Moti Masjid, or Pearl Mosque, located within the premises of the Agra Fort, and admire its pristine white marble architecture, intricately carved domes, and peaceful ambiance, reflecting the spiritual and cultural heritage of the Mughal era.</p>
    </li>
</ul>
<br><br>
<p>Here are some activities to enjoy in Agra:</p>
<ul>
    <li>
        <b>Sunset View of Taj Mahal:</b>
        <p>Witness the breathtaking beauty of the Taj Mahal during sunset from Mehtab Bagh, across the Yamuna River, as the golden hues of the setting sun cast a mesmerizing glow on the iconic monument, creating a magical and unforgettable sight.</p>
    </li>
    <li>
        <b>Cultural Show:</b>
        <p>Immerse yourself in the vibrant culture of Agra with a traditional cultural show, featuring classical music and dance performances, showcasing the rich heritage and artistic traditions of the region, and providing an enchanting evening of entertainment.</p>
    </li>
    <li>
        <b>Bazaar Exploration:</b>
        <p>Embark on a shopping expedition in Agra's bustling bazaars, such as Kinari Bazaar and Sadar Bazaar, where you can browse for exquisite handicrafts, marble souvenirs, jewelry, textiles, and traditional Agra specialties like petha and dalmoth, offering a delightful shopping experience.</p>
    </li>
    <li>
        <b>Culinary Delights:</b>
        <p>Indulge in the culinary delights of Agra with a gastronomic tour, sampling iconic Mughlai dishes like kebabs, biryanis, and rich curries, as well as local delicacies like bedai, chaat, and sweet treats like petha and jalebi, tantalizing your taste buds and exploring the city's vibrant food scene.</p>
    </li>
    <li>
        <b>Bicycle Tour:</b>
        <p>Explore the charming lanes and hidden gems of Agra on a bicycle tour, pedaling through the city's historic neighborhoods, bustling markets, and scenic riverfronts, while immersing yourself in its rich history, architectural wonders, and local culture.</p>
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
                    <h3 style="color: orange;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Agra, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./agra_hotel1.jpg" class="card-img-top" alt="Agra Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">The Oberoi Amarvilas, Agra</h5>
                                    <p class="card-text">Experience unparalleled luxury and breathtaking views of the Taj Mahal at The Oberoi Amarvilas, Agra.
                                        This award-winning hotel offers opulent rooms, fine dining experiences, and personalized service.
                                        Guests can also enjoy exclusive access to the Taj Mahal from the hotel's private terrace.</p>
                                    <a href="https://www.oberoihotels.com/hotels-in-agra-amarvilas-resort/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./agra_hotel2.png" class="card-img-top" alt="Agra Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">ITC Mughal, A Luxury Collection Hotel, Agra</h5>
                                    <p class="card-text">Indulge in Mughal-inspired luxury at ITC Mughal, A Luxury Collection Hotel, Agra.
                                        Set amidst lush gardens, this hotel offers spacious rooms, fine dining options, and rejuvenating spa treatments.
                                        Guests can explore Agra's rich heritage with guided tours to the Taj Mahal and other historical sites.</p>
                                    <a href="https://www.itchotels.com/in/en/itcmughal-agra?utm_source=google&utm_medium=cpc&utm_content=search&utm_campaign=HQ-DTL|HTL|Agra|ITCMughal|Search|Conversions|PANIndia|always-on|Owned|LC|GGL|NA|NA|Leisure|AGRLC|Brand&gad_source=1&gclid=EAIaIQobChMIxdXa94GuhgMVFaNmAh36HAgBEAAYASAAEgLQAfD_BwE" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./agra_hotel3.jpg" class="card-img-top" alt="Agra Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Courtyard by Marriott Agra</h5>
                                    <p class="card-text">Conveniently located near the Taj Mahal, Courtyard by Marriott Agra offers modern comforts and excellent service.
                                        Guests can unwind in stylish rooms, dine at the hotel's restaurants serving a variety of cuisines, and relax by the poolside.
                                        The hotel also provides easy access to other attractions such as Agra Fort and Fatehpur Sikri.</p>
                                    <a href="https://www.marriott.com/hotels/travel/agrcy-courtyard-agra/" class="btn btn-primary">Check out</a>
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
