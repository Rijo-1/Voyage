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
$location_id = 16; // Assuming 16 is the location_id for Louvre Museum
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
    <title>Louvre Museum</title>
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
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">Louvre Museum</h1>
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
                        <img class="d-block w-100" src="./louvre1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./louvre2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./louvre3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./louvre4.jpg" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./louvre5.jpg" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./louvre6.jpg" alt="Sixth slide">
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
                    <p>The Louvre Museum, located in Paris, France, is one of the world's largest and most visited art museums. It is housed in the Louvre Palace, originally built as a fortress in the late 12th century under Philip II. Remnants of the fortress are still visible in the museum's basement.</p>
                    <p>The Louvre is home to thousands of works of art, ranging from ancient Egyptian artifacts to masterpieces of European painting, including Leonardo da Vinci's "Mona Lisa" and the Greek statue "Venus de Milo." Its vast collection spans over 8,000 years of human history and culture, making it a must-visit destination for art lovers and history enthusiasts alike.</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting the Louvre Museum:</p>
                    
                    <b>Timings:</b>
                    <ul>
                        <li>The Louvre Museum is open every day except Tuesdays and certain holidays, from 9 AM to 6 PM, with extended hours on Wednesdays and Fridays until 9:45 PM.</li>
                    </ul>

                    <b>Entry Fare:</b>
                    <ul>
                        <li>Ticket prices vary depending on the type of access and age of the visitor. Free admission is available for certain groups. Tickets can be purchased online or at the museum.</li>
                    </ul>

                    <b>Restrictions:</b>
                    <ul>
                        <li>Due to security measures, large bags are not allowed, and all visitors must undergo a security check before entering.</li>
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
                            <input type="text" class="form-control" id="location_id" name="location_id" value="16" readonly>
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
                    <h3 style="color: red;">Luxury Hotels Nearby :</h3>
                    <p>For a luxurious stay near the Louvre Museum, consider these nearby hotels:</p>
                    
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./lovre_h1.webp" class="card-img-top" alt="Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">The Ritz Paris</h5>
                                    <p class="card-text">Indulge in luxury at The Ritz Paris, offering elegant accommodations, Michelin-starred dining, and a spa in the heart of Paris.</p>
                                    <a href="https://www.ritzparis.com/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./lovre_h2.jpg" class="card-img-top" alt="Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Le Meurice</h5>
                                    <p class="card-text">Experience refined luxury at Hotel Le Meurice, housed in a historic building near the Louvre, offering stunning views and impeccable service.</p>
                                    <a href="https://www.dorchestercollection.com/en/paris/le-meurice/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./lovre_h3.webp" class="card-img-top" alt="Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">The Westin Paris - Vendôme</h5>
                                    <p class="card-text">Discover luxury at The Westin Paris - Vendôme, featuring elegant rooms, a rooftop restaurant with panoramic views, and a spa offering rejuvenating treatments.</p>
                                    <a href="https://www.marriott.com/en-us/hotels/pardt-the-westin-paris-vendome/overview/" class="btn btn-primary">Check out</a>
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
