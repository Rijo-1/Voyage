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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">VARANASI</h1>
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
                        <img class="d-block w-100" src="./varna1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./varna2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./varn3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./varna4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./varna5.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./varn6.jpg" alt="Third slide">
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
                    <p>Varanasi, often described as the spiritual heart of India, is a city that pulsates with vibrant energy and ancient wisdom along the banks of the sacred River Ganges. Steeped in mythology, legend, and centuries of religious devotion, Varanasi is a place where time seems to stand still, offering a profound and transformative experience to all who visit. Wander through its narrow alleys lined with colorful ghats, where pilgrims perform ritual ablutions and cremations take place amidst the chanting of mantras and the ringing of temple bells. Witness the mesmerizing Ganga Aarti ceremony at Dashashwamedh Ghat, where priests offer prayers to the river goddess every evening as thousands of lamps float gently on the water. Explore the city's countless temples, including the Kashi Vishwanath Temple dedicated to Lord Shiva, and the serene Sarnath, where Buddha delivered his first sermon. Varanasi is not merely a destination; it is a spiritual journey, a place where the soul finds solace, and the mysteries of life and death intertwine in a timeless dance along the sacred river.

                        .</p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Here are the details for visiting places in Varanasi:</p>
<ul>
    <li>
        <b>Kashi Vishwanath Temple:</b>
        <p>Pay homage at one of the holiest Hindu temples dedicated to Lord Shiva, located in the heart of Varanasi's old city, and witness its sacred rituals and spiritual fervor.</p>
    </li>
    <li>
        <b>Assi Ghat:</b>
        <p>Experience the spiritual ambiance of Assi Ghat, one of the most revered ghats along the Ganges River, where pilgrims perform rituals, yoga enthusiasts gather at dawn, and mesmerizing Ganga Aarti ceremonies take place.</p>
    </li>
    <li>
        <b>Sarnath:</b>
        <p>Explore the ancient Buddhist site of Sarnath, where Lord Buddha preached his first sermon after attaining enlightenment, and visit its impressive stupas, monasteries, and the renowned Dhamek Stupa.</p>
    </li>
    <li>
        <b>Ramnagar Fort:</b>
        <p>Step back in time at the historic Ramnagar Fort, located on the eastern bank of the Ganges River, and marvel at its grand architecture, museum exhibits, and the traditional Ramnagar Ramlila performance during Dussehra.</p>
    </li>
    <li>
        <b>Manikarnika Ghat:</b>
        <p>Witness the cycle of life and death at Manikarnika Ghat, the principal cremation ground in Varanasi, where Hindu funeral rituals are performed with reverence amidst the eternal flames.</p>
    </li>
</ul>
<br><br>
<p>Here are some activities to enjoy in Varanasi:</p>
<ul>
    <li>
        <b>Boat Ride on the Ganges:</b>
        <p>Embark on a soul-stirring boat ride along the sacred Ganges River during sunrise or sunset, witnessing the ancient ghats, temples, and bustling riverfront activity, while absorbing the spiritual essence of Varanasi.</p>
    </li>
    <li>
        <b>Walking Tour of Old City:</b>
        <p>Immerse yourself in the labyrinthine lanes of Varanasi's old city on a guided walking tour, discovering hidden temples, vibrant markets, and age-old traditions, as you delve into the city's rich cultural tapestry.</p>
    </li>
    <li>
        <b>Evening Ganga Aarti:</b>
        <p>Participate in the mesmerizing Ganga Aarti ceremony held every evening at Dashashwamedh Ghat, where priests offer prayers to the sacred river amidst chanting, incense, and the mesmerizing spectacle of illuminated lamps.</p>
    </li>
    <li>
        <b>Varanasi Food Tour:</b>
        <p>Embark on a culinary odyssey through Varanasi's gastronomic delights, sampling local delicacies like chaat, lassi, kachori, and the famous Banarasi paan, while exploring the city's vibrant food markets and eateries.</p>
    </li>
    <li>
        <b>Yoga and Meditation Retreat:</b>
        <p>Rejuvenate your mind, body, and soul with a yoga and meditation retreat in Varanasi, where you can practice ancient yoga asanas, learn meditation techniques, and experience spiritual enlightenment in the serene surroundings of this sacred city.</p>
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
                    <p>If you are seeking an exceptional lodging experience during your visit to Varanasi, we highly recommend these hotels:</p>
                    <div class="row">
                        <!-- Hotel 1 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./var_h1.jpg" class="card-img-top" alt="Varanasi Hotel 1">
                                <div class="card-body">
                                    <h5 class="card-title">Taj Ganges, Varanasi</h5>
                                    <p class="card-text">Experience luxury and tranquility at Taj Ganges, Varanasi, situated on the banks of the sacred Ganges River.
                                        Guests can enjoy spacious rooms with traditional décor, exquisite dining options, and rejuvenating spa treatments.
                                        The hotel also offers guided tours to explore the rich cultural heritage of Varanasi.</p>
                                    <a href="https://www.tajhotels.com/en-in/taj/taj-ganges-varanasi/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 2 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./var_h2.jpg" class="card-img-top" alt="Varanasi Hotel 2">
                                <div class="card-body">
                                    <h5 class="card-title">The Gateway Hotel Ganges, Varanasi</h5>
                                    <p class="card-text">Nestled amidst lush gardens, The Gateway Hotel Ganges offers a serene retreat in the heart of Varanasi.
                                        Guests can relax in elegantly appointed rooms, dine at the hotel's restaurants serving authentic local cuisine, and participate in cultural activities such as evening aarti ceremonies by the Ganges.</p>
                                    <a href="https://gateway.tajhotels.com/en-in/ganges-varanasi/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <!-- Hotel 3 -->
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./var_h3.jpg" class="card-img-top" alt="Varanasi Hotel 3">
                                <div class="card-body">
                                    <h5 class="card-title">Radisson Hotel Varanasi</h5>
                                    <p class="card-text">Conveniently located near Varanasi Junction railway station, Radisson Hotel Varanasi offers modern comforts and warm hospitality.
                                        Guests can unwind in well-appointed rooms, savor international cuisine at the hotel's restaurants, and enjoy panoramic views of the city from the rooftop pool.</p>
                                    <a href="https://www.radissonhotels.com/en-us/hotels/radisson-varanasi" class="btn btn-primary">Check out</a>
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
