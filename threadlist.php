<!-- INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('1', 'Cow is ill..', 'It is not eating from past five days..', '1', '0', current_timestamp()); -->



<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>helpAll</title>
  </head>
  <body>
  <?php
  include('partials/header.php');
  include('dbconnect.php');
  $id=$_GET['catid'];
  $sql="SELECT * FROM `categories` WHERE category_id=$id";
  $result=mysqli_query($conn,$sql);
  
  while($row=mysqli_fetch_assoc($result)){
    $catname=$row['category_name'];
    $catdesc=$row['category_description'];
    
  }
  ?>


<?php
$showAlert=false;
$method=$_SERVER['REQUEST_METHOD'];
if($method=="POST"){
  $th_tittle=$_POST['ptitle'];
  $th_desc=$_POST['desc'];
  $sno=$_SESSION['sno'];
  $sql=" INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_tittle', '$th_desc', '$id', '$sno', current_timestamp()); ";
  $result=mysqli_query($conn,$sql);
  
  $showAlert=true;
  if($showAlert){
    echo'<div class="alert alert-success" role="alert">
     Your Thread has been added.
  </div>';
  }
}

?>

  <!-- Card -->
<div class="container my-4">
  <div class="jumbotron">
  <h1 class="display-4"><?php echo $catname;?></h1>
  <p class="lead"><?php echo $catdesc;?></p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  
  </div>
</div>


<?php
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true ){
echo'
<div class="container">
<h1 class="text-center py-2">Ask a Questions</h1>
<form actio="'. $_SERVER["REQUEST_URI"].'" method="POST">
  <div class="form-group">
    <label for="ptitle">Problem Title</label>
    <input type="text" class="form-control" id="ptitle" name="ptitle" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="desc">Your Consern</label>
    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
  </div>
  <input type="hidden" name="sno" value='. $_SESSION["sno"].'>
 
  <button type="submit" class="btn btn-success">Submit</button>
</form>
</div>';
}
else{
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="text-center py-2">Ask a Questions</h1>
    <h5 class="display-8">Please Login to ask Qustions.</h5>
   
  </div>
</div>
  ';
}
?>
<hr>

<div class="container md-2">
    <h1 class="text-center py-2">Browse Questions</h1>
    <?php
    $id=$_GET['catid'];
  $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id;";
  $result=mysqli_query($conn,$sql);
  $noQus=true;
  while($row=mysqli_fetch_assoc($result)){
    $noQus=false;
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];
    $threadid=$row['thread_id'];
    $thread_time=$row['timestamp'];
    $thread_user_id=$row['thread_user_id'];

    $sql2="SELECT email FROM `users` WHERE sno='$thread_user_id'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    
   

    echo'<div class="media py-2">
    <img src="https://tse4.mm.bing.net/th?id=OIP.wRtvON_8JKRQghdROw5QvQHaHa&pid=Api&P=0&h=180" width="60px" class="mr-3" alt="...">
    <div class="media-body">
    <p class="font-weight-bold my-o">Posted by:  '.$row2['email'].'    at  '.$thread_time.'</p>
<h5 class="mt-0"><a class="text-dark "href="thread.php?threadid='.$threadid.'">'. $title.'</a></h5>
      <p>'.$desc.'</p>
    </div>
  </div>';
}
if($noQus){
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h5 class="display-8">Be The First Person to ask.</h5>
   
  </div>
</div>';
}

  ?>
    
   
    
    
</div>
  <?php
  include('partials/footer.php');
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  
  </body>
</html>