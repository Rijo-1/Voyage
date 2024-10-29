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
                  <a class="nav-link" href="index.html" style="color: white;">Log out</a>
                </li>
              </ul>
             
            </div>
          </div>
        </nav>
        <h1 style="color: white; padding: 12px; text-align: center; color: red;">The Great Ocean Road</h1>
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
              <img class="d-block w-100" src="aust-great-ocean-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-great-ocean-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-great-ocean-3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-great-ocean-4.jpg" alt="Fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-great-ocean-5.jpg" alt="Fifth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-great-ocean-6.jpg" alt="Sixth slide">
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
            <p>The Great Ocean Road is one of the most scenic drives in the world, stretching along the southeastern coast of Australia. Known for its breathtaking ocean views, rugged cliffs, and iconic landmarks like the Twelve Apostles, this route offers a spectacular journey through some of the country’s most picturesque landscapes.

              Constructed by returning soldiers between 1919 and 1932 and dedicated to soldiers killed during World War I, it is both a historic and natural treasure. Visitors can explore charming coastal towns, lush rainforests, and beautiful beaches along the way.

              Whether you’re interested in surfing, hiking, wildlife spotting, or simply enjoying the stunning scenery, the Great Ocean Road provides an unforgettable adventure for all who travel its length.</p>
          </div>
        </div>

        <div class="container">
          <div class="details">
            <h3 style="color: red;">Details :</h3>
            <p>Here are the details for visiting the Great Ocean Road:</p>
            
            <b>Route:</b>
            <ul>
              <li>The Great Ocean Road begins in Torquay, just south of Melbourne, and stretches westward for about 243 kilometers to Allansford.</li>
            </ul>

            <b>Highlights:</b>
            <ul>
              <li>Twelve Apostles: These limestone stacks are one of the most famous sights along the road.</li>
              <li>Loch Ard Gorge: A picturesque spot with a tragic shipwreck history.</li>
              <li>Great Otway National Park: Home to lush rainforests, waterfalls, and diverse wildlife.</li>
              <li>Bells Beach: A world-renowned surfing spot.</li>
              <li>Port Campbell National Park: Known for its striking coastal formations.</li>
            </ul>

            <b>Travel Tips:</b>
            <ul>
              <li>Allow at least two to three days to fully explore the Great Ocean Road and its attractions.</li>
              <li>Drive carefully, as the road can be winding and narrow in places.</li>
              <li>Check weather conditions before your trip, as coastal weather can be unpredictable.</li>
              <li>Bring a camera to capture the stunning landscapes.</li>
            </ul>
          </div>
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
          <p>If you are seeking an exceptional lodging experience during your visit to The Great Ocean Road, we highly recommend these hotels:</p>
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 24rem;">
                <img src="aust-great-ocean-hotel-1.jpg" class="card-img-top" alt="hotel">
                <div class="card-body">
                  <h5 class="card-title">Cumberland Lorne Resort</h5>
                  <p class="card-text">Located in the heart of Lorne, Cumberland Lorne Resort offers luxurious accommodation with stunning views of the ocean and easy access to the beach and local attractions.</p>
                  <a href="https://cumberland.com.au/" class="btn btn-primary">Check out</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 24rem;">
                <img src="aust-great-ocean-hotel-2.jpg" class="card-img-top" alt="hotel">
                <div class="card-body">
                  <h5 class="card-title">Apollo Bay Eco YHA</h5>
                  <p class="card-text">Apollo Bay Eco YHA provides comfortable and eco-friendly accommodation, perfect for budget travelers looking to explore the Great Ocean Road.</p>
                  <a href="https://www.yha.com.au/hostels/vic/great-ocean-road/apollo-bay/" class="btn btn-primary">Check out</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 24rem;">
                <img src="aust-great-ocean-hotel-3.jpg" class="card-img-top" alt="hotel">
                <div class="card-body">
                  <h5 class="card-title">Deep Blue Hotel & Hot Springs</h5>
                  <p class="card-text">Located in Warrnambool, Deep Blue Hotel & Hot Springs offers a luxurious stay with relaxing hot springs, perfect for unwinding after a day of exploring the Great Ocean Road.</p>
                  <a href="https://thedeepblue.com.au/" class="btn btn-primary">Check out</a>
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
