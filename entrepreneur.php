<?php
  session_start()
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Projects</title>
  <link rel="stylesheet" type="text/css" href="entrepreneur.css">
  <script src="form2.js"></script>
</head>
<body>
<p>Welcome to your profile, your email is 
    <?php echo $_SESSION['Email']; ?>
      
      </p>
      
  <h1 class="header-title">My Projects</h1>
  <div class="container">
    <div class="table-container">
      <table class="project-table">
        <!-- Table rows for existing projects -->
        <tr>
          <th></th>
          <th class="datecreated-header">Date created</th>
        </tr>
        <tr class="project-row" >
          <td class="project-name">Digital Innovation</td>
          <td class="date-created">2022-04-19</td>
          <td class="delete-button">
            <button class="delete-project-button" onclick="deleteProject(this)">Delete</button>
          </td>
        </tr>
        <tr class="project-row" >
          <td class="project-name">Barbie dreams</td>
          <td class="date-created">2023-08-01</td>
          <td class="delete-button">
            <button class="delete-project-button" onclick="deleteProject(this)">Delete</button>
          </td>
        </tr>
      

        <!-- Add a row to input new project details -->
        <tr class="project-row">
          <td class="project-name">
            <input type="text" id="newProjectName" placeholder="Enter Project Name">
          </td>
          <td class="date-created">
            <input type="date" id="newProjectDate">
          </td>
        </tr>
      </table>
      <!-- Add the "Submit" button -->
      <br><br>
      <button id="add" onclick="addNewProject()">Add Project</button>
    </div>
    <!-- Additional information content goes here -->
    <div class="additional-info">
      <h2>Go to:</h2>
      <ol>
        <li><a href="diginnovation.php" class="toplinks2">Digital Innovation</a></li>
        <li><a href="barbiedreams.php" class="toplinks2">Barbie Dreams</a></li>
        <a href="home.php" class="back-link">BACK TO HOME</a>
      </ol>

    </div>

  </div>
  
        
      
 </body>
 </html> 
  
  