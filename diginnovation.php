<!DOCTYPE html>
<html>
<head>
  <title>Digital Innovation</title>
  <link rel="stylesheet" type="text/css" href="digstyles.css"> <!-- Link to your CSS file -->
</head>
<body>
  <div class="container">
    <div class="project-details">
      <h1 class="header-title">Digital Innovation Project</h1>

      <!-- Document Submission Form -->
      <h2 class="sub-header">Submit Documents</h2>
      <form action="entrepreneur.php" method="post" enctype="multipart/form-data">
        <label for="document">Select a document:</label>
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload" name="submit" class="submit-button">

      </form>

      <!-- View Interested Investors -->
      <h2 class="sub-header">Interested Investors</h2>
      <ul class="project-list">
        <li>Investor 1</li>
        <li>Investor 2</li>
        <li>Investor 3</li>
        <!-- Add more investors as needed -->
      </ul>

      <div class="back-link">
        <a href="entrepreneur.php">Back to Projects</a>
      </div>
    </div>
  </div>
</body>
</html>
