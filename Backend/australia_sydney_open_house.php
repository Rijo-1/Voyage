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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">The Sydney Opera House</h1>
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
                        <img class="d-block w-100" src="aust_syd_op_hus_1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="aust_syd_op_hus_2jpg.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="aust_syd_op_hus_3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="aust_syd_op_hus_4jpg.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="aust_syd_op_hus_5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="aust_syd_op_hus_6.jpg" alt="Third slide">
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
                    <p>The Sydney Opera House stands as an iconic masterpiece of architecture, symbolizing both the cultural vibrancy and architectural ingenuity of Australia. Situated on the picturesque Sydney Harbour, its distinctive sail-like design makes it instantly recognizable worldwide. 

                        Crafted by Danish architect Jørn Utzon and completed in 1973, the Opera House hosts a diverse range of performances, including opera, ballet, symphony concerts, and theater productions, drawing artists and audiences from across the globe.
                        
                        Visitors can marvel at its stunning exterior, with its interlocking shell-like structures, while guided tours offer an immersive experience into its history, design, and inner workings. Whether attending a world-class performance or simply admiring its striking silhouette against the harbor backdrop, the Sydney Opera House is a must-visit destination for any traveler exploring Australia's cultural landscape.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting the Sydney Opera House:</p>
                    
                    <b>Timings:</b>
                    <ul>
                        <li>The Sydney Opera House is open daily from 9:00 AM to 5:00 PM.</li>
                        <li>Timings may vary for guided tours, performances, and other events.</li>
                    </ul>

                    <b>Entry Fare:</b>
                    <ul>
                        <li>Guided tours: Prices start from $42 AUD for adults and $22 AUD for children.</li>
                        <li>Performance tickets: Prices vary based on the show, seating, and availability. It's recommended to book tickets in advance.</li>
                        <li>Some areas, like the exterior platforms, may be accessible for free.</li>
                    </ul>

                    <b>Restrictions:</b>
                    <ul>
                        <li>Photography is allowed in most areas, but flash photography and recording during performances are generally prohibited.</li>
                        <li>Large bags and backpacks may not be allowed inside performance venues and are subject to security checks.</li>
                        <li>Food and drinks may have restrictions depending on the specific event or venue regulations.</li>
                        <li>Smoking is prohibited within the Opera House premises.</li>
                        <li>Pets are not allowed, with exceptions for service animals.</li>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to The Sydeney Opera House, we highly recommend these hotels </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="aus-syd-hotel-1.webp" class="card-img-top" alt="australia">
                                <div class="card-body">
                                    <h5 class="card-title">Park Hyatt Sydney</h5>
                                    <p class="card-text">Nestled on the edge of Sydney Harbour, Park Hyatt Sydney offers an unparalleled luxury experience with stunning views of the Sydney Opera House and Harbour Bridge.</p>
                                    <a href="https://www.hyatt.com/en-US/hotel/australia/park-hyatt-sydney/sydph?src=agn_resmedau_corp_sem_google_Search_Goo_SYDPH_IN_Brand_EM_Search_SYDPH_IN_Brand_EM_park+hyatt+sydney&gad_source=1&gclid=Cj0KCQjw0ruyBhDuARIsANSZ3wrPU-LKhy1OyJ5Fd8raFZUcUxvOheUQHa8X_H9_EP765QUL16-ZL8oaAgP6EALw_wcB&gclsrc=aw.ds" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="aus-syd-hotel-2.webp" class="card-img-top" alt="brazil">
                                <div class="card-body">
                                    <h5 class="card-title">Shangri-La Hotel, Sydney</h5>
                                    <p class="card-text">Shangri-La Hotel, Sydney, located in the historic Rocks district, offers world-class luxury and some of the best panoramic views of Sydney Harbour, including the Opera House.</p>
                                    <a href="https://www.shangri-la.com/sydney/shangrila/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="aus-syd-hotel-3.webp" class="card-img-top" alt="Canada">
                                <div class="card-body">
                                    <h5 class="card-title">InterContinental Sydney</h5>
                                    <p class="card-text">InterContinental Sydney is a heritage hotel in a restored 19th-century building, combining historic charm and modern luxury with excellent views of the Sydney Opera House.</p>
                                    <a href="https://www.sydney.intercontinental.com/" class="btn btn-primary">Check out</a>
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
