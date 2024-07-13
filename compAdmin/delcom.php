<?php
include('session.php');
include('dbconn.php');
if(isset($_GET["id"])){
    $id=$_GET['id'];
    $sql="DELETE FROM usercomp WHERE cid=$id";
    $res=mysqli_query($conn,$sql);

    if (!$res) {
        echo "Error deleting record: " . mysqli_error($conn);
        exit; // Exit script if there's an error
    }
}

header('location:complaint.php');
exit;
?>
