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
$location_id = 2; // Assuming 1 is the location_id for Sydney Opera House
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
    <title>China</title>
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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">Great Wall Of China</h1>
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
                        <img class="d-block w-100" src="./china1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./china2.jpeg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./china3.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./china4.jpeg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./china5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./china6.png" alt="Third slide">
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
                    <p>The Great Wall of China, a symbol of China's rich history and grandeur, stretches over 13,000 miles across the northern borders of China. Built over centuries, this architectural marvel was primarily constructed to protect Chinese states and empires from invasions and raids.

                        The Great Wall weaves through varied terrains, including mountains, deserts, and grasslands, showcasing different construction techniques and materials used throughout different dynasties. The most visited sections, like Badaling near Beijing, are well-preserved and offer breathtaking views and historical insights.

                        Visitors can explore the watchtowers, fortresses, and ancient pathways, gaining a deep appreciation for the ingenuity and labor that went into building this incredible structure. Whether hiking along its rugged paths or taking in the panoramic vistas, the Great Wall of China provides an unforgettable experience of China's historical might and cultural heritage.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting the Great Wall of China:</p>
                    
                    <b>Timings:</b>
                    <ul>
                        <li>The Great Wall is open daily from 7:30 AM to 5:30 PM, though timings may vary based on the specific section of the wall.</li>
                        <li>Guided tours may have specific start times, so it is advisable to check in advance.</li>
                    </ul>

                    <b>Entry Fare:</b>
                    <ul>
                        <li>Entry fees vary by section. For example, Badaling charges around ¥40-45 RMB for adults and ¥20-25 RMB for children.</li>
                        <li>Tickets for cable cars or other transportation options may be additional.</li>
                    </ul>

                    <b>Restrictions:</b>
                    <ul>
                        <li>Photography is allowed, but drone usage is restricted without special permission.</li>
                        <li>Visitors should stay on designated paths to preserve the structure and for safety reasons.</li>
                        <li>Food and drinks should be carried in reusable containers to minimize waste.</li>
                        <li>Smoking is prohibited within the premises.</li>
                        <li>Pets are generally not allowed, except for service animals.</li>
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
                            <input type="text" class="form-control" id="location_id" name="location_id" value="2" readonly>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to The Great Wall of China, we highly recommend these hotels:</p>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./china_h1.webp" class="card-img-top" alt="China">
                                <div class="card-body">
                                    <h5 class="card-title">The Commune by the Great Wall</h5>
                                    <p class="card-text">The Commune by the Great Wall offers a unique blend of modern architecture and natural beauty, providing a luxurious retreat with stunning views of the Great Wall.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/china/commune-by-the-great-wall/pekub" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./china_h2.jpg" class="card-img-top" alt="China">
                                <div class="card-body">
                                    <h5 class="card-title">Brickyard Retreat at Mutianyu</h5>
                                    <p class="card-text">Located near the Mutianyu section of the Great Wall, Brickyard Retreat offers a peaceful and eco-friendly stay with beautiful views and excellent amenities.</p>
                                    <a href="https://brickyardmutianyu.com/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./china_h3.avif" class="card-img-top" alt="China">
                                <div class="card-body">
                                    <h5 class="card-title">Yanqi Lake Kempinski Hotel</h5>
                                    <p class="card-text">Situated close to the Great Wall, Yanqi Lake Kempinski Hotel offers luxurious accommodations, a serene environment, and stunning views of the surrounding landscape.</p>
                                    <a href="https://www.kempinski.com/en/yanqi-hotel-managed-by-kempinski/overview/hotel-information/location" class="btn btn-primary">Check out</a>
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
