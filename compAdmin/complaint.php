<?php
include('session.php');
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
    .create-btn {
      color: white;
      text-decoration: none;
      padding: 5px;
      border-radius: 10px;
      background-color: #dc3545;
    }

    /* Add a class to indicate selected option */
    .selected {
      background-color: #0076d1;
      color: black;
    }

    /* Table styling */
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th, table td {
      border: 1px solid #ddd;
      padding: 3px;
      text-align: left;
    }

    table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    /* Buttons styling */
    .btn {
      padding: 6px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    
    }

    .edit-btn {
      background-color: #007bff;
      color: white;
    }

    .delete-btn {
      background-color: #dc3545;
      color: white;
    }
    th:nth-child(1) {
      width: 10%;
    }

    /* Decrease size of 4th column */
    th:nth-child(2) {
      width: 20%;
    }
     th:nth-child(3) {
      width: 10%;
    }

    /* Decrease size of 4th column */
    th:nth-child(4) {
      width: 10%;
    }
    th:nth-child(5) {
      width: 40%;
    }

    /* Decrease size of 4th column */
    th:nth-child(6) {
      width: 40%;
    }
    td:nth-child(1) {
      width: 10%;
    }

    /* Decrease size of 4th column */
    td:nth-child(2) {
      width: 20%;
    }
     td:nth-child(3) {
      width: 10%;
    }

    /* Decrease size of 4th column */
    td:nth-child(4) {
      width: 10%;
    }
    td:nth-child(5) {
      width: 40%;
    }

    /* Decrease size of 4th column */
    td:nth-child(6) {
      width: 40%;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Page</h2>
    <ul>   <!-- Add 'selected' class to the Admin option -->
      <li><a href="complaint.php" class="selected">Complaints</a></li>
      <li><a href="user.php">User</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </div>

  <div class="content">
    <div class="navbar">
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>
<br><br>
<br>
<h1>Complaints page  <a href="createcom.php" class="create-btn">create</a></h1>
    <!-- Your main content goes here -->
    <table>
      <thead>
        <tr>
          <th>name</th>
          <th>Area</th>
          <th>Mobile</th>
          <th>complain type</th>
          <th>complain desc</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
        include('dbconn.php');
        $sql="SELECT cid, name, mobile, area, compcat, compdesc FROM usercomp";
        $result=mysqli_query($conn,$sql);
        if(!$result){
          echo"connection failed";
        }
        while($row = $result->fetch_array()){
          echo"
           <tr>
          <td>$row[name]</td>
          <td>$row[area]</td>
          <td>$row[mobile]</td>
          <td>$row[compcat]</td>  
          <td>$row[compdesc]</td>
          <td>
            <button class='btn edit-btn' ><a href='/editcom.php?id=$row[cid]'>Edit</a></button>
            <button class='btn delete-btn'><a href='/delcom.php?id=$row[cid]'>Delete</a></button>
          </td>
        </tr>
          ";
        }
        ?>
        
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</body>
</html>
