<?php
    include('connection.php');
    $limit = 10;
    $offset = 0;
    if (isset($_GET['offset'])) {
        $offset = $_GET['offset'];
    }

    // Query to fetch posts with the LIMIT and OFFSET
    $sql = "SELECT * FROM addpost LIMIT $limit OFFSET $offset";
    
    // Execute the query
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Loop through the result and display each post
        while ($row = $result->fetch_assoc()) {
            $uname = $row['uname'];
            $image = $row['image'];
            echo '<img src="' . $image . '" alt="Post Image">';
            echo '<p>' . $uname . '</p>';
        }
    } else {
        echo "No data found.";
    }

    // Check if there are more entries (for the Next button)
    $next_offset = $offset + $limit;
    echo '<a href="addpost.php?offset=' . $next_offset . '">Next</a>';
    echo '<a href="add.php">Add View</a>';
?>
