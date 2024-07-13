<?php
include('dbconn.php');
if(isset($_POST['submit'])){
  $getdata="select * from userprofile where email='".$_POST['email']."'";
  $getresult=mysqli_query($conn,$getdata);
  $getdatar=mysqli_num_rows($getresult);

if($getdatar>0){
  echo "<script>alert('user already exists')</script>";
}else{
  $sql = "INSERT INTO userprofile(name, mobile, email, password) VALUES ('".$_POST['uname']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['pass']."')";
  $result = mysqli_query($conn, $sql);
  if($result){
    header('Location: login.php'); 
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial;
            background: -webkit-linear-gradient(to right, #50bee6, #80ff80);
            background: linear-gradient(to right, #50bee6, #80ff80);
            color: whitesmoke;
        }

        form {
            width: 800px;
            height: 680px;
            margin: auto;
            color: whitesmoke;
            position: relative;
            top: 100px;
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(11, 15, 13, 0.582);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
        }

        h1 {
            color: #00cc66;
            text-align: center;
            margin-top: 100px;
        }

        div {
            margin-top: 90px;
            align-self: center;
            max-width: 600px;
            margin: auto;
        }

        .form-label {
            color: #0080ff;
        }

        .form-text {
            color: white;
        }
    </style>
</head>

<body>
<form method="POST" >
        <div><label><h1>register</h1></label></div><br>
        <div class="mb-3">
            <label for="exampleInputname" class="form-label">Your Name</label>
            <input type="text" name="uname" class="form-control" id="exampleInputname">
        </div>

        <div class="form-group">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile</label>
                <input type="tel" name="mobile" class="form-control" id="exampleInputmobile"
                    aria-describedby="mobileHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
            </div>
            <div><button type="submit" name = "submit" class="btn btn-primary">Submit</button></div>
        </div>
    </form>
</body>

</html>
