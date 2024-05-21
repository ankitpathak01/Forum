<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="idiscuss";


$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id=$_GET['id'];
$method=$_SERVER['REQUEST_METHOD'];
$show="true";

if($method=="POST"){
   
   $username=$_POST['username']; 
   $useremail=$_POST['useremail']; 
   $sql="UPDATE `users` SET `name` = '$username', `email` = '$useremail' WHERE `users`.`sno` = 19";
   $result=mysqli_query($conn,$sql);
   if($result){
    header('location:admin.php');
   }
}

?>

<?php

$sql="SELECT * FROM `users` WHERE sno=".$id;
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['name'];
    $email=$row['email'];
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>helpAll</title>
  </head>
  <body>
  <?php
  include('partials/header.php');
  ?>
   

<!-- <div class="modal fade" id="SignupModel" tabindex="-1" aria-labelledby="SignupModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SignupModelLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <form action="<?php  $_SERVER["REQUEST_URI"] ?>" method="POST">
      <div class="modal-body">
  <div class="form-group">
    <label for="username">Name</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?php echo $name; ?>">
    
  </div>
  <div class="form-group">
    <label for="useremail">Email address</label>
    <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" value="<?php echo $email; ?>">
  </div>

  
  <button type="submit" class="btn btn-primary">Update</button>
</div>

</form>
    </div>
  </div>
</div>


<?php
  include('partials/footer.php');
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>