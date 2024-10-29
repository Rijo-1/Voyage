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
$location_id = 4; // Assuming 4 is the location_id for Monday Palace
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
    <title>Monday Palace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <style>
       .card {
            margin-bottom: 30px;
            margin-right: 15px;
            margin-left: 15px;
            border: 1px black; /* Match the box color */
        }
        .card-img-top {
            object-fit: cover;
            height: 200px;
            width: 100%;
        }
        .recommendation .card {
            background-color: black; /* Match the box color */
            color: white;
        }
        .recommendation .card-body {
            background-color: black; /* Match the box color */
        }
        /* Add margin to the columns to create space between them */
        .row.justify-content-between > [class*="col-"] {
            margin-right: 15px; /* Adjust the margin as needed */
        }

        /* Remove margin from the last column to avoid extra space */
        .row.justify-content-between > [class*="col-"]:last-child {
            margin-right: 0;
        }

    </style>
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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">Summer Palace</h1>
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
                        <img class="d-block w-100" src="./summer1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./summer2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./summer3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./summer4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./summer5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./summer6.jpg" alt="Third slide">
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
                    <h3 style="color: red;">Description :</h3>
                    <p>Summer Palace is a historical landmark located in the heart of the city. It served as the royal residence for monarchs during the ancient dynasty. The palace features stunning architecture, expansive gardens, and rich cultural heritage. Visitors can explore the intricately decorated halls, beautiful courtyards, and serene ponds that reflect the grandeur of a bygone era.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting Summer Palace:</p>
                    
                    <b>Timings:</b>
                    <ul>
                        <li>Monday Palace is open to visitors from 9:00 AM to 6:00 PM every day.</li>
                        <li>Guided tours are available for those interested in learning more about the history and architecture of the palace.</li>
                    </ul>

                    <b>Entry Fare:</b>
                    <ul>
                        <li>Entrance Ticket to the Summer Palace: 30 RMB /ticket (peak season) 20 RMB/ticket (off-season).</li>
                        <li>Through Ticket to the Summer Palace:  60 RMB /ticket (peak season) 50 RMB/ticket (off-season)</li>
                        <li>Special discounts are available for seniors, students, and groups.</li>
                    </ul>

                    <b>Restrictions:</b>
                    <ul>
                        <li>Photography is allowed in designated areas, but flash photography is prohibited inside the palace.</li>
                        <li>Visitors are required to dress modestly and respectfully while visiting the palace grounds.</li>
                        <li>Food and drinks are not allowed inside the palace buildings.</li>
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
                            <input type="text" class="form-control" id="location_id" name="location_id" value="4" readonly>
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
                    <p>If you are seeking exceptional lodging experiences during your visit to Summer Palace, consider these reputable hotels:</p>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./summer_h1.jpg" class="card-img-top" alt="Monday Palace Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Grand Hotel</h5>
                                    <p class="card-text">Experience luxury and elegance at Palace Grand Hotel, located in the vicinity of Monday Palace. Enjoy impeccable service,
                                    modern amenities, and breathtaking views of the palace grounds.</p>
                                    <a href="https://grandhotelbeijing.com/en_US/hotelartandculture.html" class="btn btn-primary">Check Availability</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./summer_h2.jpg" class="card-img-top" alt="Monday Palace Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Aman Summer Palace</h5>
                                    <p class="card-text">Aman Summer Palace lies just steps from the East Gate of its eponymous Unesco World Heritage Site, with a door away from the historic garden estate. A peaceful retreat arranged around tranquil courtyards, the resort’s elegant rooms and suites are housed in gracious pavilions – those that accommodated guests of the Empress Dowager Cixi over 100 years ago.  </p>
                                    <a href="https://www.aman.com/resorts/aman-summer-palace" class="btn btn-primary">Check Availability</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./summer_h3.jpg" class="card-img-top" alt="Monday Palace Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Grand Hyatt Beijing</h5>
                                    <p class="card-text">Located on Wangfujing, within walking distance of The Forbidden City and Tiananmen Square, Grand Hyatt Beijing is part of Oriental Plaza with direct access to the adjacent shopping mall. Blending both western and oriental traditions encompassing contemporary design and classic standards of service and excellence, our hotel allows you to experience Beijing in our own way.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/china/grand-hyatt-beijing/beigh?src=corp_aspac_agn_iprospect_sem_hyattsem_google_br_00450&gad_source=1&gclid=Cj0KCQjwmMayBhDuARIsAM9HM8cKfdhEKO8jo4yRvCwK0tKPDcxB2YvO_tGbofvsiGR0qtmELe8K6lQaAimcEALw_wcB" class="btn btn-primary">Check Availability</a>
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
