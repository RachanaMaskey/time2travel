<?php
    // session_start();
    include('connection.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username from session
        $uname = $_SESSION['USER_NAME'] ?? 'Guest'; // Default to 'Guest' if session variable is not set
        
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
                $sql = "INSERT INTO addpost (uname, image) VALUES ('$uname', '$targetFile')";
                if ($conn->query($sql)) {
                    echo "<p>Picture added successfully</p>";
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<style>
  body{
   
      background: rgba(54, 162, 235, 0.2);
  }
</style>

<body class="container p-4">
  <form class="row g-3" method="POST" action="#" enctype="multipart/form-data">
    <!-- <div class="container mb-2"><a class="btn btn-secondary" href="./index.php">Dashboard</a></div> -->
    <h2>Add Post <?php ?></h2>

   <div class="col-sm-12">
   <label for="image">Image:</label>
    <input type="file" class="form-control shadow-sm" id="image" name="image" required>
   </div>

    <button class="btn btn-primary shadow-sm" type="submit">Add Product</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>