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
$location_id = 10; // Assuming 2 is the location_id for Karnak Temple
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
    <title>Karnak Temple</title>
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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">Karnak Temple</h1>
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
                        <img class="d-block w-100" src="./kar1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kar2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kar3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kar4.jpg" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kar5.jpg" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./kar6.jpg" alt="Sixth slide">
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
                    <<div class="description">
    <div style="color: white;">
        <h3 style="color: red;">Description :</h3>
        <p>Karnak Temple, located near Luxor in Egypt, is one of the largest temple complexes in the world. Dedicated primarily to Amun-Ra, the chief deity of the Theban Triad, Karnak served as the religious center of the ancient Egyptian city of Thebes.</p>
        <p>The temple complex is renowned for its massive columns, towering statues, and intricate hieroglyphs. Visitors can explore various precincts, including the Great Hypostyle Hall, the Sacred Lake, and the Karnak Open Air Museum.</p>
        <p>Karnak Temple offers a fascinating glimpse into the religious beliefs and architectural achievements of ancient Egypt, making it a must-visit destination for history enthusiasts and travelers alike.</p>
    </div>
</div>

<div class="container">
    <div class="details">
        <h3 style="color: red;">Details :</h3>
        <p>Here are the details for visiting Karnak Temple:</p>
        
        <b>Timings:</b>
        <ul>
            <li>The temple complex is open year-round from early morning to late afternoon.</li>
            <li>Specific hours may vary depending on the season, so it's advisable to check the official website or local guides for updated timings.</li>
        </ul>

        <b>Entry Fee:</b>
        <ul>
            <li>Entrance fees apply for visitors, with discounts available for students and children.</li>
            <li>Guided tours are also available for an additional fee.</li>
        </ul>

        <b>Nearby Attractions:</b>
        <ul>
            <li>Karnak Temple is situated close to other notable attractions in Luxor, including Luxor Temple, the Valley of the Kings, and the Mortuary Temple of Hatshepsut.</li>
            <li>Visitors can explore these sites as part of guided tours or independent excursions.</li>
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
                <input type="text" class="form-control" id="location_id" name="location_id" value="10" readonly>
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
        <p>If you are looking for luxurious accommodations near Karnak Temple, consider these options:</p>
        
        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                    <img src="./kar_h1.jpg" class="card-img-top" alt="Hotel 1">
                    <div class="card-body">
                        <h5 class="card-title">Steigenberger Nile Palace Luxor Hotel & Convention Center</h5>
                        <p class="card-text">Experience elegance and comfort at Steigenberger Nile Palace Luxor, offering breathtaking views and top-notch amenities near Karnak Temple.</p>
                        <a href="https://www.steigenberger.com/en/hotels/all-hotels/egypt/luxor/steigenberger-nile-palace" class="btn btn-primary">Check out</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                    <img src="./kar_h2.avif" class="card-img-top" alt="Hotel 2">
                    <div class="card-body">
                        <h5 class="card-title">Hilton Luxor Resort & Spa</h5>
                        <p class="card-text">Indulge in luxury and relaxation at Hilton Luxor Resort & Spa, featuring stylish accommodations and world-class facilities in proximity to Karnak Temple.</p>
                        <a href="https://www.hilton.com/en/hotels/luxhitw-hilton-luxor-resort-and-spa/" class="btn btn-primary">Check out</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                    <img src="./kar_h3.jpg" class="card-img-top" alt="Hotel 3">
                    <div class="card-body">
                        <h5 class="card-title">Sofitel Winter Palace Luxor</h5>
                        <p class="card-text">Enjoy luxury and sophistication at Sofitel Winter Palace Luxor, offering historic charm and modern amenities near Karnak Temple.</p>
                        <a href="https://sofitel.accor.com/en/hotels/1661.html" class="btn btn-primary">Check out</a>
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


