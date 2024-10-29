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
        <h1 style="color: white; padding: 12px; text-align: center; color: red;">Daintree Rainforest</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="aust-5-1.webp" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-5-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-5-3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-5-4.jpg" alt="Fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-5-5.jpg" alt="Fifth slide">
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
            <p>The Daintree Rainforest is a lush tropical rainforest located in North Queensland, Australia. It is the oldest continually surviving tropical rainforest in the world, estimated to be around 180 million years old. This unique ecosystem is home to an incredible diversity of flora and fauna, including many rare and endangered species.

            The Daintree Rainforest is part of the Wet Tropics of Queensland World Heritage Area, recognized for its outstanding natural beauty and ecological significance. Visitors can explore the rainforest through various guided tours, hiking trails, and river cruises, offering an immersive experience in this ancient and vibrant environment.

            Highlights of the Daintree Rainforest include the stunning Mossman Gorge, the scenic Daintree River, and the pristine Cape Tribulation beaches, where the rainforest meets the Great Barrier Reef. Whether you're a nature enthusiast, a wildlife lover, or simply seeking a tranquil escape, the Daintree Rainforest offers an unforgettable adventure into one of the world's most extraordinary natural wonders.</p>
          </div>
        </div>
        <div class="container">
          <div class="details">
            <h3 style="color: red;">Details :</h3>
            <p>Here are the details for visiting the Daintree Rainforest:</p>
            <b>Timings:</b>
            <ul>
              <li>The Daintree Rainforest is accessible year-round, with different areas having varying operating hours for guided tours and attractions.</li>
              <li>Best times to visit are during the dry season (May to October) when the weather is more favorable for outdoor activities.</li>
            </ul>
            <b>Entry Fare:</b>
            <ul>
              <li>Entry to the rainforest itself is free, but guided tours and specific attractions may have fees.</li>
              <li>Prices for guided tours range from $50 to $150 AUD per person, depending on the type and duration of the tour.</li>
            </ul>
            <b>Restrictions:</b>
            <ul>
              <li>Photography is allowed, but drones may have restrictions in certain areas.</li>
              <li>Stay on designated paths and trails to protect the delicate ecosystem.</li>
              <li>Food and drink regulations may vary, so it's best to check with tour operators.</li>
              <li>Smoking is prohibited within the rainforest area.</li>
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
            <p>If you are seeking an exceptional lodging experience during your visit to the Daintree Rainforest, we highly recommend these accommodations:</p>
            <div class="row">
              <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                  <img src="aust-5-hot-1.jpg" class="card-img-top" alt="Daintree Eco Lodge">
                  <div class="card-body">
                    <h5 class="card-title">Daintree Eco Lodge</h5>
                    <p class="card-text">Nestled in the heart of the Daintree Rainforest, this eco-friendly lodge offers a serene retreat with luxurious treehouses, spa treatments, and guided rainforest tours.</p>
                    <a href="https://www.daintree-ecolodge.com.au/" class="btn btn-primary">Visit</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                  <img src="aust-5-hot-2.webp" class="card-img-top" alt="Silky Oaks Lodge">
                  <div class="card-body">
                    <h5 class="card-title">Silky Oaks Lodge</h5>
                    <p class="card-text">Located on the Mossman River, Silky Oaks Lodge combines luxury with nature. Enjoy gourmet dining, riverfront cabins, and a range of rainforest activities.</p>
                    <a href="https://silkyoakslodge.com.au/" class="btn btn-primary">Visit</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card" style="width: 24rem;">
                  <img src="aust-5-hot-3.jpg" class="card-img-top" alt="Cape Tribulation Beach House">
                  <div class="card-body">
                    <h5 class="card-title">Cape Tribulation Beach House</h5>
                    <p class="card-text">Experience the rainforest and the reef at this unique beachfront property. Stay in rustic cabins and enjoy direct access to the beach and surrounding trails.</p>
                    <a href="https://www.capetribbeach.com.au/" class="btn btn-primary">Visit</a>
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
