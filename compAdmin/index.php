<?php

session_start();

include('dbconn.php');
if(isset($_POST['submit'])){
  $getdata="select * from admin where username='".$_POST['user']."' AND password='".$_POST['pass']."'";
  $getresult=mysqli_query($conn,$getdata);
  $getdatar=mysqli_fetch_array($getresult);

if(!empty($getdatar)){
$_SESSION['username']=$getdatar['username'];
header('Location: complaint.php'); 
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
  color:whitesmoke;
}
form{
    width: 500px;
    height: 500px;
    margin: auto;
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
    color:  #050606;
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
        <div><label><h1>ADMIN Login </h1></label></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="user" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control"name="pass" id="exampleInputPassword1">
            </div><div><button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
</body>
</html>