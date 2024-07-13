<?php

session_start();

include('dbconn.php');
if(isset($_POST['submit'])){
  $getdata="select * from userprofile where email='".$_POST['email']."' AND password='".$_POST['pass']."'";
  $getresult=mysqli_query($conn,$getdata);
  $getdatar=mysqli_fetch_array($getresult);

if(!empty($getdatar)){
  $_SESSION['id']=$getdatar['uid'];
$_SESSION['username']=$getdatar['name'];
header('Location: main.php'); 
}else{
  echo "error:".$getdata."<br>".mysqli_error($conn);
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
    body{
  font-family:Arial; 
  background: -webkit-linear-gradient(to right, #50bee6, #80ff80); 
  background: linear-gradient(to right, #50bee6, #80ff80); 
  color:whitesmoke;
}
form{
    width: 500px;
    height: 500px;
    margin-top: 65px;
    margin-left: -102px;
    color:whitesmoke;
    position: fixed;
    top: 100px;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(11, 15, 13, 0.582);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
}
    h1{
    color:  #00cc66;
    text-align:center;
    margin-top: 100px ;
}   
div{
    margin: top 90px;
    align-self:center;
    max-width: 300px;
    margin: auto;    
}
.form-text{
  color:white ;
}
.form-label{
  color: #0080ff;
}

  </style>
</head>
<body>

<div class="col-sm-3 my-1">
  <br>
      <form  method="POST">
        <div><label><h1>Login </h1></label></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control"name="pass" id="exampleInputPassword1">
            </div><div><button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <button  formaction="register.php" class="btn btn-primary">REGISTER</button></div>
            </div>
          </form>

</body>
</html>