<?php
include('sessionn.php');
include('dbconn.php');
if(isset($_POST['submit'])){
  
  $sql = "INSERT INTO usercomp(name, mobile, area, compcat, compdesc) VALUES ('".$_POST['fname']."','".$_POST['phoneNo']."','".$_POST['area']."','".$_POST['section']."','".$_POST['subject']."')";

  $result = mysqli_query($conn, $sql);
  if($result){
    header('Location: main.php'); 
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    
    .mainform{
    margin: 50px 230px 50px 230px;
    padding: 2rem;
    border: 1px solid rgb(224,224,224) ;
    border-radius: 15px;
    box-shadow: 10px 7px 0 rgb(224,224,224);
    background-color: white;
    display: flex;
    }

    .header{
        font-size: 17px;
        font-family: candara;
        display: flex-end;
    }

    input[type=text], select, textarea {
    display: flex;
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

@media screen and (max-width: 680px) {
  .header, .mainform, input[type=submit] {
    margin: 0px 0px 0px 0px;
    
  }
}


</style>

<body style="background:  linear-gradient(to top left, #ffffff 0%, #80ff80 100%);">
    <div class= "mainform">
    <form  method="POST">


    <!--Header-->

    <div class = "header">
    <h1><b>Complaint Form</b></h1>
        <p>Please send us details about the incident you would like to report. Our Complaint Center will analyze your complaint and take the appropriate measures 
          in order that the reported situation will not occur at any other time in the future.</p>
          <hr/>
    </div>
    

    <br><br>
    <!-- Name-->

    <div class="form-group">
        <label for="fname"><b>Name:</b></label>
        <input type="text" class="form-control" id="fname" placeholder="Enter your name" name="fname">
      </div>

     <br>


    <!-- Phone number-->
    
    <div class="form-group">
        <label for="phoneNo"> <b>Phone Number: </b> </label>
        <input type="text" id="phone" class="form-control" placeholder="Enter mobile Number" name = "phoneNo" >
      </div>
    
      <br>
    <!-- Select your area-->

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
     
    <br>
    <br>
    <!-- Category of complaint-->
    
    <div id="formsection">
        <label><b>What is the category of complain you are facing?</b></label>

        <p><input type="radio" name="section" value="water">Water</p>
        <p><input type="radio" name="section" value="electricity">Electricity</p>
        <p><input type="radio" name="section" value="Enviornment">Enviornment</p>

      </div>
    

    <br>
    <!-- Complaint Details-->

    <label for="subject"><b>Complaint Details:</b></label>
    <textarea id="subject" name="subject" placeholder="Enter your complaint details......." style="height:200px"></textarea>
    <!--Submit Button-->
    <div><button type="submit" name ="submit" class="btn btn-outline-primary">Submit</button>
      <button type="button" class="btn btn-outline-primary" ><a href="/main.html">Cancel</a></button>
      </div>
    </form>
</div>
</body>
</html>
