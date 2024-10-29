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
    <title>Kangroo Forest</title>
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
        <h1 style="color: white; padding: 12px; text-align: center; color: red;">Kangaroo Island's Forests</h1>
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
              <img class="d-block w-100" src="aust-6-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-6-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-6-3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-6-4.webp" alt="Fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="aust-6-5.jpg" alt="Fifth slide">
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
            <p>Kangaroo Island, located off the coast of South Australia, is renowned for its pristine wilderness and abundant wildlife. The island's forests are a significant part of this natural beauty, offering visitors a unique glimpse into Australia's rich biodiversity.</p>
            <p>The forests of Kangaroo Island are home to diverse plant species, including the unique Kangaroo Island Narrow-leaved Mallee and many types of eucalypts. The island is also a sanctuary for wildlife, such as kangaroos, koalas, echidnas, and a variety of bird species. Conservation parks and protected areas like Flinders Chase National Park provide ample opportunities for hiking, bird watching, and wildlife spotting.</p>
            <p>Visitors can explore the forests through a network of well-maintained trails that wind through dense woodlands, open heathlands, and along the island's stunning coastline. From the iconic Remarkable Rocks to the Admirals Arch, Kangaroo Island's forests offer an unforgettable experience for nature enthusiasts and adventure seekers alike.</p>
          </div>
        </div>
        <div class="container">
          <div class="details">
            <h3 style="color: red;">Details :</h3>
            <p>Here are the details for visiting the forests of Kangaroo Island:</p>
            <b>Timings:</b>
            <ul>
              <li>Kangaroo Island's forests and parks are generally accessible year-round, with some areas having specific opening hours.</li>
              <li>Best times to visit are during the spring and autumn months when the weather is mild and wildlife is most active.</li>
            </ul>
            <b>Entry Fare:</b>
            <ul>
              <li>Entry to most national parks and conservation areas on Kangaroo Island is free, but some attractions may charge a fee.</li>
              <li>Guided tours are available and range from $50 to $200 AUD per person, depending on the type and duration of the tour.</li>
            </ul>
            <b>Restrictions:</b>
            <ul>
              <li>Photography is allowed, but drones may have restrictions in certain areas.</li>
              <li>Stay on designated paths and trails to protect the delicate ecosystem.</li>
              <li>Food and drink regulations may vary, so it's best to check with tour operators or park authorities.</li>
              <li>Smoking is prohibited within the forests and park areas.</li>
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
          <div class="recommendation">
            <h3 style="color: red;">Recommendations :</h3>
            <p>If you are seeking an exceptional lodging experience during your visit to Kangaroo Island, we highly recommend these accommodations:</p>
            <div class="row">
				<div class="col-md-4 mb-4">
				  <div class="card" style="width: 24rem;">
					<img src="aust-6-hot-1.jpg" class="card-img-top" alt="Southern Ocean Lodge">
					<div class="card-body">
					  <h5 class="card-title">Southern Ocean Lodge</h5>
					  <p class="card-text">This luxury lodge offers breathtaking views of the Southern Ocean, with eco-friendly design, gourmet dining, and guided tours of the island's natural attractions.</p>
					  <a href="https://southernoceanlodge.com.au/" class="btn btn-primary">Check out</a>
					</div>t
				  </div>
				</div>
				<div class="col-md-4 mb-4">
				  <div class="card" style="width: 24rem;">
					<img src="aust-6-hot-2.jpg" class="card-img-top" alt="Kangaroo Island Wilderness Retreat">
					<div class="card-body">
					  <h5 class="card-title">Kangaroo Island Wilderness Retreat</h5>
					  <p class="card-text">Located on the edge of Flinders Chase National Park, this retreat offers comfortable accommodations, wildlife encounters, and easy access to forest trails.</p>
					  <a href="https://www.turtlesands.com.au/book-now/?utm_medium=paidsearch&utm_source=google&utm_campaign=nrma-ts-launch&utm_content=aq&utm_term=240508-nrma-ts-launch&gad_source=1&gclid=CjwKCAjwmYCzBhA6EiwAxFwfgAxP4cyZn0QjweLsI7LafPP5R0vt0TufURSiRXAMhe0m_IfP5fIo6RoCNGMQAvD_BwE&gclsrc=aw.ds" class="btn btn-primary">Check out</a>
					</div>
				  </div>
				</div>
				<div class="col-md-4 mb-4">
				  <div class="card" style="width: 24rem;">
					<img src="aust-6-hot-3.jpg" class="card-img-top" alt="Ecopia Retreat">
					<div class="card-body">
					  <h5 class="card-title">Ecopia Retreat</h5>
					  <p class="card-text">Experience sustainable luxury in the heart of Kangaroo Island with eco-friendly villas, stunning views, and a focus on conservation and wildlife.</p>
					  <a href="https://ecopiaretreat.com.au/" class="btn btn-primary">Check out</a>
					</div>
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
