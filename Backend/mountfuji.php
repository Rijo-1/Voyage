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
            
            <h1 style="color: white; padding: 12px; text-align: center; color: red;">MOUNT FUJI</h1>
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
                        <img class="d-block w-100" src="./f2new.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./finew.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./f3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./f4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./f1.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./f6.jpg" alt="Third slide">
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
                    <p>Mount Fuji, Japan's tallest peak and a UNESCO World Heritage Site, offers visitors a breathtaking experience amidst its majestic beauty. Travelers flock to this iconic symbol of Japan to witness its awe-inspiring volcanic cone, often shrouded in mist and surrounded by pristine lakes and lush forests. Whether you're an adventurous climber or prefer to admire from afar, Mount Fuji promises unforgettable vistas and serene surroundings. From the scenic Five Lakes region at its base to the Fuji Subaru Line 5th Station for panoramic views, exploring Mount Fuji is a journey into nature's grandeur and cultural significance.
                        <br><br>Moreover, Mount Fuji holds a special place in Japanese culture and spirituality, revered as a sacred mountain and an inspiration for artists and poets throughout history. Visitors can immerse themselves in the rich cultural heritage surrounding Mount Fuji, including traditional festivals, art exhibitions, and spiritual pilgrimages. Whether marveling at the sunrise from its summit or capturing its beauty in a traditional Japanese painting, Mount Fuji captivates the imagination and leaves a lasting impression on all who encounter its majestic presence.



                    </p>
                </div>
            </div>

            <div class="container">
                <div class="details">
                    <h3 style="color: red;">Details :</h3>
                    <p>Certainly! Here are the details for visiting places around Mount Fuji:</p>
                    <li>
                        <b>Fuji Five Lakes:</b>
                        <p>Explore the stunning Fuji Five Lakes region, offering breathtaking views of Mount Fuji reflected in serene lakes, surrounded by picturesque landscapes ideal for hiking, camping, and nature photography.</p>
                    </li>
                    <li>
                        <b>Chureito Pagoda:</b>
                        <p>Marvel at the iconic Chureito Pagoda, nestled amidst cherry blossom trees, providing a stunning backdrop for capturing postcard-worthy views of Mount Fuji against the changing colors of the seasons.</p>
                    </li>
                    <li>
                        <b>Hakone:</b>
                        <p>Experience the natural beauty and hot springs of Hakone, a popular resort town located near Mount Fuji, offering panoramic views from the Hakone Ropeway, tranquil boat cruises on Lake Ashi, and rejuvenating onsen baths.</p>
                    </li>
                    <li>
                        <b>Fuji Subaru Line 5th Station:</b>
                        <p>Ascend to the Fuji Subaru Line 5th Station, the starting point for climbing Mount Fuji during the official climbing season (July and August), where you can enjoy stunning vistas of the surrounding landscape and prepare for your ascent.</p>
                    </li>
                    <li>
                        <b>Oshino Hakkai:</b>
                        <p>Visit Oshino Hakkai, a scenic village renowned for its crystal-clear ponds fed by snowmelt from Mount Fuji, offering a glimpse into traditional rural life and the opportunity to sample local cuisine and artisanal crafts.</p>
                    </li>
                    <br><br>
                    <p>Paid Places to Visit around Mount Fuji:</p>
                    <ul>
                        <li>
                            <b>Fujisan World Heritage Center:</b>
                            <p>Learn about the cultural and natural significance of Mount Fuji at the Fujisan World Heritage Center, featuring interactive exhibits, multimedia presentations, and panoramic views of the mountain.</p>
                            <p><b>Timings:</b> 9:00 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥500 per person</p>
                        </li>
                        <li>
                            <b>Kawaguchiko Music Forest Museum:</b>
                            <p>Step into a whimsical world of music and nostalgia at the Kawaguchiko Music Forest Museum, showcasing vintage musical instruments, automated music boxes, and enchanting live performances in a European-inspired setting.</p>
                            <p><b>Timings:</b> 9:30 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥1,200 per person</p>
                        </li>
                        <li>
                            <b>Gotemba Premium Outlets:</b>
                            <p>Indulge in retail therapy at the Gotemba Premium Outlets, offering discounted shopping opportunities with over 200 international and Japanese brands, surrounded by stunning views of Mount Fuji.</p>
                            <p><b>Timings:</b> 10:00 AM to 8:00 PM</p>
                            <p><b>Fare Charges:</b> Free admission</p>
                        </li>
                        <li>
                            <b>Fujigoko Ropeway:</b>
                            <p>Soar above the scenic landscapes of the Fuji Five Lakes region on the Fujigoko Ropeway, providing panoramic views of Mount Fuji, Lake Kawaguchi, and the surrounding forests from its observation decks.</p>
                            <p><b>Timings:</b> 9:00 AM to 5:00 PM</p>
                            <p><b>Fare Charges:</b> ¥1,000 for adults, ¥500 for children (round trip)</p>
                        </li>
                        <li>
                            <b>Grinpa Amusement Park:</b>
                            <p>Experience family-friendly fun at Grinpa Amusement Park, offering thrilling rides, interactive attractions, and educational exhibits focused on the natural wonders and cultural heritage of Mount Fuji and its surroundings.</p>
                            <p><b>Timings:</b> 10:00 AM to 6:00 PM</p>
                            <p><b>Fare Charges:</b> Varies by attraction</p>
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
            
                <div class="recommendation">
                    <h3 style="color: red;">Recommendations :</h3>
                    <p>If you are seeking an exceptional lodging experience during your visit to Mount Fuji, we highly recommend these hotels </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./1.jpg" class="card-img-top" alt="australia">
                                <div class="card-body">
                                    <h5 class="card-title">Fuji View Hotel</h5>
                                    <p class="card-text">Indulge in luxury at the Fuji View Hotel, offering elegant rooms with panoramic views of Mount Fuji, traditional Japanese hospitality, and gourmet dining options featuring seasonal ingredients from the region.</p>
                                    <a href="https://www.swissotel.com/hotels/nankai-osaka/" class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./hosh.avif" class="card-img-top" alt="brazil">
                                <div class="card-body">
                                    <h5 class="card-title">Hoshinoya Fuji</h5>
                                    <p class="card-text">Escape to the tranquil surroundings of Hoshinoya Fuji, a luxury glamping resort nestled in the forests near Mount Fuji, offering spacious cabins with private hot spring baths, gourmet dining experiences, and guided nature walks.</p>
                                    <a href="https://hoshinoresorts.com/en/hotels/hoshinoyafuji/"class="btn btn-primary">Check out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="width: 24rem;">
                                <img src="./fujih.jpg" class="card-img-top" alt="Canada">
                                <div class="card-body">
                                    <h5 class="card-title">Hotel Mount Fuj</h5>
                                    <p class="card-text">Experience comfort and convenience at Hotel Mount Fuji, ideally located near the iconic mountain. Enjoy cozy rooms with stunning views, impeccable service, and easy access to nearby attractions, making it the perfect base for exploring the beauty of Mount Fuji.</p>
                                    <a href="https://www.expedia.co.in/Hotel-Search?selected=1207459&startDate=2024-05-27&endDate=2024-05-28&MDPCID=IN.META.HPA.HOTEL-CORESEARCH-desktop-PROMOTED.HOTEL&adults=2&children=&MDPDTL=HTL.1207459.20240527.20240528.DDT.2.CID.20898087060.AUDID..RRID.bex_in_desktop&mctc=10&ct=hotel&mpg=INR&mpf=12449.85&mpj=2160.71&mpl=INR&exp_pg=google&langid=en&ad=2&tp=&utm_source=google&utm_medium=cpc&utm_term=1207459&utm_content=localuniversal&utm_campaign=HotelAds&rateplanid=204340937&mpm=24&mpn=200803069&mpo=EC&mpp=1&gclid=CjwKCAjw9cCyBhBzEiwAJTUWNfhnhgziwpFjZkGa1xgNhB9NJKibSePbMh2HhkVQ6Eaclj26shBA9hoCjiEQAvD_BwE&regionId=6271764&destination=Yamanakako%2C%20Yamanashi%20Prefecture%2C%20Japan&theme=&userIntent=&semdtl=&useRewards=false&sort=RECOMMENDED" class="btn btn-primary">Check out</a>
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
