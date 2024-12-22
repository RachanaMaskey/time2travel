<?php
    // session_start();
    include('connection.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username from session
        $uname = $_SESSION['USER_NAME'] ?? 'Guest'; // Default to 'Guest' if session variable is not set
        
        // Retrieve the caption from the form input
        $caption = $_POST['caption'] ?? ''; // Default to empty string if no caption is provided

        // Ensure the uploads directory exists
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Create directory if it doesn't exist
        }

        // File upload handling
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Insert product data into the database
                $sql = "INSERT INTO addpost (uname, image,caption) VALUES ('$uname', '$targetFile','$caption')";
                if ($conn->query($sql)) {
                    echo "<p>Picture and captionadded successfully</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . $connect->error;
                }
            } else {
                echo "<p>Sorry, there was an error uploading your post.</p>";
            }
        } else {
            echo "<p>File upload failed. Please try again.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>

  <!-- CSS -->
  <link href="css/uikit.min.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div id="page">
        <div class="uk-width-4-5 uk-width-1-1@m" style="background-color: #f2e0c9;">
                <a href="index.php"><img src="images/logo1.png" width="120" height="46"
                alt="maczac" /></a>
        </div>
        <section class="btm-one-wrap full-width" style="background-color: #8c3838;">
            <div class="container" style="width: 800px; margin: 0 auto;">
                <div class="qc-card">
                <div>
                    <h1 class="h1-light">Add Posts Here</h1>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data" class="uk-grid-small" uk-grid>
                    <div class="col-sm-12">
                        <label for="image" style="color: white; font-size: 1.5rem;" class="h2-dark">Image:</label>
                        <input type="file" class="uk-form-large form-control shadow-sm" id="image" name="image" required>
                    </div>
                    <div class="uk-width-1-1">
                        <label for="caption" style="color: white; font-size: 1.5rem;" class="h2-dark">Caption:</label>
                        <input class="uk-form-large form-control shadow-sm" type="text" placeholder="Caption" name="caption" required />
                    </div>
                    <div class="uk-width-1-1">
                    <button class="btn-transparent hvr-sweep-to-top"  style="background-color: #8c3838;;" type="submit">Add Post</button>
                    </div>
                </form>
                </div>
            </div>
        </section>

         <!-- ##### FOOTER ##### -->
         <footer class="footer-outer">

            <div class="footer-wrap container-l">
                <div class="copyright">
                    <p>&copy;  2021 Theme Ten by <a href="index.php" target="_blank" class="hvr-line-light-center">MacZac.com</a>. All rights reserved.</p>
                    <p>Photo credit: Unsplash, Pixabay &amp; Pexels.</p>
                    <p><a href="index.php" target="_blank"  class="hvr-line-light-center">Disclaimer</a> | <a href="https://maczac.com" target="_blank"  class="hvr-line-light-center">Site Map</a> | <a href="https://maczac.com" target="_blank"  class="hvr-line-light-center">Privacy Policy</a> </p>
                </div> <!-- /.copyright -->
                <a href="#" id="go-top" class="bg-transition" title="Go to top" uk-totop uk-scroll></a>
            </div>
        </footer>

    </div>
</body>

</html>