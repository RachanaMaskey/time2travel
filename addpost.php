<?php
include('connection.php');
$limit = 10;
$offset = 0;
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
}

// Query to fetch posts with the LIMIT and OFFSET
$sql = "SELECT uname, image, caption,date FROM addpost LIMIT $limit OFFSET $offset";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Time2Travel</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="maczac.com" />
    <link rel="icon" href="favicon.png" type="images/logo1.png" />

    <!-- CSS -->
    <link href="css/uikit.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="page">
        <div class="uk-width-4-5 uk-width-1-1@m" style="background-color: #f2e0c9;">
            <a href="index.php"><img src="images/logo1.png" width="120" height="46" alt="maczac" /></a>
        </div>
        <section class="btm-one-wrap full-width" style="background-color: #8c3838;">
            <div>
                <h1 class="h1-light">Our Experienced Customers</h1>
            </div>
            <br>
            <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
                <?php
                if ($result && $result->num_rows > 0) {
                    // Loop through the result and display each post with styling
                    while ($row = $result->fetch_assoc()) {
                        $uname = $row['uname'];
                        $image = $row['image'];
                        $date = $row['date']; 
                        $caption= $row['caption'];// Fetch the value from database
                        echo '<div style="width: 350px; background-color: #8c3838; color: white; padding: 10px; border-radius: 10px;">';
                        echo '    <div class="uk-inline-clip uk-transition-toggle" style="border: 5px solid #8c3838;">';
                        echo '        <img src="' . $image . '" width="600" height="800" alt="Post Image" class="uk-transition-scale-up uk-transition-opaque" />';
                        echo '        <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-primary">';
                        echo '            <div class="uk-text-center">';
                        echo '                <p style="font-size: 18px; margin: 0;"> ' . htmlspecialchars($uname) . ' &nbsp;' . htmlspecialchars($date) .'</p>';
                        echo '                <p style="font-size: 14px; margin: 1px 0;">' . htmlspecialchars($caption) . '</p>'; // Display the time
                        echo '            </div>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p style='color: white;'>No data found.</p>";
                }
                ?>
            </div>
            <div style="text-align: center; margin: 20px;">
                <?php
                // Check if there are more entries (for the Next button)
                $next_offset = $offset + $limit;
                echo '<a href="addpost.php?offset=' . $next_offset . '" style="background-color: #8c3838;" class="btn-transparent hvr-sweep-to-top">Next</a>';

                echo '&nbsp;&nbsp;&nbsp;<a href="add.php" style="background-color: #8c3838;" class="btn-transparent hvr-sweep-to-top">Add View</a>';
                ?>
            </div>
        </section>

        <!-- ##### FOOTER ##### -->
        <footer class="footer-outer">
            <div class="footer-wrap container-l">
                <div class="copyright">
                    <p>&copy; 2021 Theme Ten by <a href="index.php" target="_blank" class="hvr-line-light-center">Time2Travel.com</a>. All rights reserved.</p>
                    <p>Photo credit: Unsplash, Pixabay &amp; Pexels.</p>
                    <p><a href="index.php" target="_blank" class="hvr-line-light-center">Disclaimer</a> | <a href="https://maczac.com" target="_blank" class="hvr-line-light-center">Site Map</a> | <a href="https://maczac.com" target="_blank" class="hvr-line-light-center">Privacy Policy</a> </p>
                </div> <!-- /.copyright -->
                <a href="#" id="go-top" class="bg-transition" title="Go to top" uk-totop uk-scroll></a>
            </div>
        </footer>
    </div>
</body>

</html>
