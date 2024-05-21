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

<!-- carasole -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://source.unsplash.com/2400x900/?cow" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x900/?dog" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://source.unsplash.com/2400x900/?buffalo" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

  <!-- Card -->
  <div class="container">
        <h2 class="text-center md-4 my-4">helpAll Categories.</h2>
        <div class="row">
          <?php
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          // echo $row['category_id'];
          $cat= $row['category_name'];
          $id= $row['category_id'];
          
          $desc=$row['category_description'];
        echo'<div class="col-md-4 my-4">
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?'.$cat.'" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
            <p class="card-text">'.substr($desc,0,50).'...</p>
            <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Thread</a>
            </div>
        </div>
    </div>';


        }


          ?>
            
        </div>
        

  </div>


  <?php
  include('partials/footer.php');
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>