<?php
// Include database connection file
include 'db_connection.php';

// Function to convert space to underscore in filename
function convertToFilename($str) {
    return strtolower(str_replace(' ', '_', $str));
}

// Check if the query parameter is set in the URL
if (isset($_GET['query'])) {
    // Get the search query from the URL
    $search_query = $_GET['query'];

    // Prepare a SQL statement to search for cities in the database
    $sql = "SELECT * FROM touristlocations WHERE location_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%{$search_query}%"; // Add wildcard characters to search for partial matches
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any matching cities are found
    if ($result->num_rows > 0) {
        // Fetch the first matching city
        $row = $result->fetch_assoc();
        
        // Construct the filename for the PHP file corresponding to the city
        $php_file_with_spaces = strtolower($row['location_name']) . '.php';
        $php_file_with_underscores = convertToFilename($row['location_name']) . '.php';

        // Check if the PHP file exists with or without underscores
        if (file_exists($php_file_with_spaces)) {
            // Redirect to the corresponding PHP file with spaces
            header("Location: $php_file_with_spaces");
            exit();
        } elseif (file_exists($php_file_with_underscores)) {
            // Redirect to the corresponding PHP file with underscores
            header("Location: $php_file_with_underscores");
            exit();
        } else {
            // Display a message if the PHP file doesn't exist
            echo "No page found for '$search_query'";
        }
    } else {
        // Display a message if no matching cities are found
        echo "No results found for '$search_query'";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle case when no search query is provided
    echo "Please enter a search query";
}
?>
