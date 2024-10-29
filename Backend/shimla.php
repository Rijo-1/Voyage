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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">SHIMLA</h1>
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
                        <img class="d-block w-100" src="./shim4.webp" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./shim2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./shim3.cms" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./sjimneww.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./shi5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./shii.jpg" alt="Third slide">
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
                    <p>Shimla, nestled in the scenic hills of Himachal Pradesh, is a charming retreat that entices travelers with its picturesque beauty and colonial charm. Once the summer capital of British India, Shimla boasts of stunning Victorian architecture, lush greenery, and panoramic views of the surrounding Himalayan ranges.
                        For nature enthusiasts, Shimla offers numerous trekking trails and nature walks that lead to secluded forests, cascading waterfalls, and serene meadows. The Jakhu Temple, perched atop the Jakhu Hill, is a sacred site dedicated to Lord Hanuman and provides panoramic views of the town below.

                        Shimla also serves as a gateway to other nearby attractions such as Kufri, known for its winter sports, and Chail, home to the highest cricket ground in the world. Whether you're seeking adventure, tranquility, or simply a retreat from the hustle and bustle of city life, Shimla has something to offer for every traveler.

                        
                        </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Shimla:</p>
<ul>
    <li>
        <b>The Ridge:</b>
        <p>Experience the vibrant heart of Shimla at The Ridge, a bustling promenade lined with shops, cafes, and colonial-era buildings. Enjoy panoramic views of the surrounding mountains and soak in the lively atmosphere of this iconic landmark.</p>
    </li>
    <li>
        <b>Jakhu Temple:</b>
        <p>Visit the sacred Jakhu Temple, perched atop Jakhu Hill, and pay homage to Lord Hanuman. Trek through scenic trails surrounded by lush greenery and enjoy breathtaking views of Shimla from the temple's vantage point.</p>
    </li>
    <li>
        <b>Mall Road:</b>
        <p>Take a leisurely stroll along Shimla's famous Mall Road, dotted with shops, restaurants, and heritage buildings. Shop for souvenirs, savor local delicacies, and immerse yourself in the charm of this iconic thoroughfare.</p>
    </li>
    <li>
        <b>Kufri:</b>
        <p>Explore the picturesque hill station of Kufri, known for its scenic beauty and adventure activities. Enjoy horse riding, yak rides, and skiing during the winter months, or simply revel in the tranquility of its snow-capped landscapes.</p>
    </li>
    <li>
        <b>Christ Church:</b>
        <p>Admire the neo-Gothic architecture of Christ Church, one of the oldest churches in North India. Marvel at its stained glass windows, intricate woodwork, and serene surroundings, offering a tranquil escape from the city bustle.</p>
    </li>
</ul>
<br><br>
<p>Here are some activities to enjoy in Shimla:</p>
<ul>
    <li>
        <b>Toy Train Ride:</b>
        <p>Embark on a nostalgic journey aboard the UNESCO World Heritage-listed Kalka-Shimla Toy Train. Wind through picturesque hills, verdant valleys, and quaint villages while relishing the charm of this iconic narrow-gauge railway.</p>
    </li>
    <li>
        <b>Trekking in Shimla Reserve Forest Sanctuary:</b>
        <p>Immerse yourself in nature with a trek through the Shimla Reserve Forest Sanctuary. Explore dense forests, meandering trails, and hidden waterfalls while encountering diverse flora and fauna in this pristine wilderness.</p>
    </li>
    <li>
        <b>Ice Skating at Circular Road:</b>
        <p>Experience the thrill of ice skating at Shimla's open-air ice skating rink on Circular Road. Whether you're a beginner or a seasoned skater, glide across the ice against the backdrop of snow-covered mountains during the winter season.</p>
    </li>
    <li>
        <b>Chadwick Falls Excursion:</b>
        <p>Escape to the tranquil oasis of Chadwick Falls, located amidst dense cedar forests near Shimla. Trek through scenic trails, listen to the soothing sounds of cascading water, and rejuvenate your senses in the lap of nature.</p>
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
                    <h3 style="color: red;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Shimla, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./shimla_hotel1.jpg" class="card-img-top" alt="Shimla Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Wildflower Hall, Shimla in the Himalayas</h5>
                                    <p class="card-text">Escape to luxury and tranquility at Wildflower Hall, Shimla in the Himalayas.
                                        Surrounded by pine forests and snow-capped mountains, this hotel offers opulent rooms, gourmet dining options, and rejuvenating spa experiences.
                                        Guests can also enjoy outdoor activities such as nature walks and picnics amidst the scenic beauty of Shimla.</p>
                                    <a href="https://www.oberoihotels.com/hotels-in-shimla-wfh/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./shimla_hotel2.jpg" class="card-img-top" alt="Shimla Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">The Oberoi Cecil, Shimla</h5>
                                    <p class="card-text">Experience colonial charm and luxury at The Oberoi Cecil, Shimla.
                                        This heritage hotel offers elegant rooms, fine dining experiences, and warm hospitality.
                                        Guests can explore Shimla's attractions including Mall Road and Jakhu Temple or simply relax amidst the hotel's lush gardens.</p>
                                    <a href="https://www.oberoihotels.com/hotels-in-shimla-cecil/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./shimla_hotel3.jpg" class="card-img-top" alt="Shimla Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Radisson Hotel Shimla</h5>
                                    <p class="card-text">Perched on the foothills of the Himalayas, Radisson Hotel Shimla offers a peaceful retreat amidst nature.
                                        Guests can enjoy comfortable rooms with scenic views, dine at the hotel's restaurants serving a variety of cuisines, and unwind at the rooftop terrace.
                                        The hotel also provides easy access to Shimla's attractions and outdoor activities.</p>
                                    <a href="https://www.radissonhotels.com/en-us/hotels/radisson-shimla" class="btn btn-primary">Check out</a>
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
