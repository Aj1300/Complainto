<?php
include('sessionn.php');
include('dbconn.php');
if(isset($_SESSION['username'])){
    $na=$_SESSION['username'];
    $sql="select * from userprofile where name ='$na'";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);
    $id=$row["uid"];
    $mobilee=$row["mobile"];
    $email=$row["email"];
    $pass=$row["password"];

    if(isset($_POST['submit'])){
          $sqll = "UPDATE userprofile SET mobile='".$_POST['mobile']."',email='".$_POST['email']."',password='".$_POST['password']."' WHERE uid=$id";
      $result = mysqli_query($conn, $sqll);
      if($result){
        header('Location: main.php'); 
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
    <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<style>
body{
  font-family:Arial; 
  background: -webkit-linear-gradient(to right, #fdfdfd, #80ff80); 
  background: linear-gradient(to right, #fefefe, #80ff80); 
  color:whitesmoke;
}
form{
    width: 800px;
    height: 680px;
    margin: auto;
    color:whitesmoke;
    position: relative;
    top: 100px;
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(11, 15, 13, 0.582);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
}

    h1{
    color: #80ff80;
    text-align:center;
    margin-top: 100px;
}   
div{
    margin: top 90px;
    align-self:center;
    max-width: 600px;
    margin: auto;    
}
.form-label{
  color: #0080ff;
}
.form-text{
  color:white ;
}

  </style>
</head>
<body>
    <form method="POST">
            <div><label><h1>Edit Profile</h1></label></div><br>

            <div class="form-group">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mobile</label>
                     <input type="tel" name="mobile" value="<?php echo $mobilee;?>" class="form-control" id="exampleInputmobile" aria-describedby="mobileHelp">
                   </div>
            <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" value="<?php echo $email;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control"name="password" value="<?php echo $pass;?>"id="exampleInputPassword1">
            </div><div><button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="submit" formaction="/main.php" class="btn btn-primary">Cancel</button>
            </div>
            </div>
          </form>
</body>
</html>


