<?php
include('session.php');
include('dbconn.php');
if(isset($_POST['submit'])){
  
  $sql = "INSERT INTO usercomp(name, mobile, area, compcat, compdesc) VALUES ('".$_POST['name']."','".$_POST['mobile']."','".$_POST['area']."','".$_POST['section']."','".$_POST['desc']."')";

  $result = mysqli_query($conn, $sql);
  if($result){
    header('Location: complaint.php'); 
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Admin Page</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
    }

    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #59d087; /* Change color to match the navbar */
      padding-top: 20px;
    }

    .sidebar h2 {
      color: white;
      text-align: center;
    }

    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }

    .sidebar li {
      padding: 8px;
      text-align: center;
    }

    .sidebar a {
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
    }

    .sidebar a:hover {
      background-color: #ddd;
      color: black;
    }

    .content {
      margin-left: 250px;
      padding: 16px;
    }

    .navbar {
      background-color: #59d087;
      padding: 20px;
      text-align: right;
    }

    .logout-btn {
      color: white;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      background-color: #dc3545;
    }

    .logout-btn:hover {
      background-color: #c82333;
    }

    @media only screen and (max-width: 768px) {
      .sidebar {
        width: 100%;
        position: relative;
        padding-top: 0;
      }

      .content {
        margin-left: 0;
      }
    }

    /* Add a class to indicate selected option */
    .selected {
      background-color: #0076d1;
      color: black;
    }

    /* Style the form */
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #f2f2f2;
      padding: 40px;
      border-radius: 10px;
    }

    .form-container h2 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: #59d087;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .form-group button:hover {
      background-color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2 style="color: #8e24c0;">Admin Page</h2>
    <ul>
      <!-- Add 'selected' class to the Admin option -->
      <li><a href="complaint.php" class="selected">Complaints</a></li>
      <li><a href="user.php">User</a></li>
      <li><a href="admin.php" >Admin</a></li>
    </ul>
  </div>

  <div class="content">
    <div class="navbar">
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>
<br>
    <!-- Your main content goes here -->
    <div class="form-container">
      <h2>Add New complaint</h2>
      <form  method="POST">
        <div class="form-group">
          <label for="username">name:</label>
          <input type="text" id="name" name="name" required>
        </div>

          <div class ="form-group">
            <label for="Select Your Area"><b>Select Your Area</b></label>
    <select id="area" name="area" >
      <option value="----">----</option>
      <option value="I.J Colony">I.J Colony</option>
      <option value="Defence Colony">Defence Colony</option>
      <option value="Dinga">Dinga</option>
      <option value="Gazi Colony">Gazi Colony</option>
      <option value="Naseera">Naseera</option>
      <option value="Tanveer Town">Tanveer Town</option>
    </select>
          </div>

           
        <div class="form-group">
            <label for="mobile">mobile:</label>
            <input type="text" id="mobile" name="mobile" required>
          </div>
          <div class="form-group">
            <div id="formsection">
                <label><b> category of complain </b></label>
        
                <p><input type="radio" name="section" value="water">Water</p>
                <p><input type="radio" name="section" value="electricity">Electricity</p>
                <p><input type="radio" name="section" value="Enviornment">Enviornment</p>
        
              </div>
          </div>
        <div class="form-group">
          <label for="desc">complaint description:</label>
          <textarea id="desc" name="desc" rows="4"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" name="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
