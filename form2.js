

// Function to add a new project to the table
function addNewProject() {
  // Get the input values for the new project
  var newProjectName = document.getElementById("newProjectName").value;
  var newProjectDate = document.getElementById("newProjectDate").value;

  // Validate input values
  if (newProjectName === "" || newProjectDate === "") {
    alert("Please enter both project name and creation date.");
    return;
  }

  // Get the table element
  var table = document.querySelector(".project-table");

  // Create a new row for the project
  var newRow = document.createElement("tr");
  newRow.classList.add("project-row");

  // Create cells for project name and creation date
  var projectNameCell = document.createElement("td");
  projectNameCell.classList.add("project-name");
  projectNameCell.textContent = newProjectName;

  var projectDateCell = document.createElement("td");
  projectDateCell.classList.add("date-created");
  projectDateCell.textContent = newProjectDate;

  // Append cells to the row
  newRow.appendChild(projectNameCell);
  newRow.appendChild(projectDateCell);

  // Append the new row to the table
  table.appendChild(newRow);

  // Clear input fields
  document.getElementById("newProjectName").value = "";
  document.getElementById("newProjectDate").value = "";
}
function deleteProject(deleteButton) {
  var row = deleteButton.closest(".project-row");
  row.remove();
}
