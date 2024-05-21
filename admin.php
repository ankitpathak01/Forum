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
  include('dbconnect.php');
  ?>
 
 <div class="container my-4" >
 <table class="table table-dark">
    
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
          <?php 
          $sno=0;
    $sql="SELECT * FROM `users`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
         $sno=$sno+1;
         $name=$row['name'];
         $email=$row['email'];
         $id=$row['sno'];
         

        echo'
        </thead>
        <tbody>
          <tr>
            <th scope="row">'.$sno.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td><a href="update.php?id='.$id.'" class="btn btn-info">Update</a></td>
            <td><a href="delete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a></td>
            </tr>
        </tbody>';
    };
    
   
  ?>
</table>
</div>

  <?php
  include('partials/footer.php');
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>