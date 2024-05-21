<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>helpAll</title>
    <style>
      #offcanvasTop {
  --bs-offcanvas-height: 80vh;
  background-color: #c5e1d4;
}
    </style>
  </head>
  <body>
  <?php
  include('partials/header.php');

$servername = "localhost";
$username = "root";
$password = "";
$database="idiscuss";


$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


 

  ?>
  <?php
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true ){

  $method=$_SERVER['REQUEST_METHOD'];
  if($method=="POST"){
   $fname=$_POST['fname']; 
   $lname=$_POST['lname']; 
   $email=$_POST['email'];
   $num=$_POST['phone'];
   $mess=$_POST['message'];
   
  
$sql="INSERT INTO `contect` ( `f_name`, `l_name`, `user_email`, `phone_number`, `message`, `timestamp`) VALUES ('$fname', '$lname', '$email', '$num', '$mess', current_timestamp())";
$result=mysqli_query($conn,$sql);
if($result){
  echo'<div class="alert alert-success" role="alert">
  Thank You.
</div>';
}
  else{
    echo'<div class="alert alert-danger" role="alert">
  Something went Wrong.
</div>';
  }

}


  
echo'
<section class="mt-5">
    <div class="bg-light py-5 ">
      <div class="container">
        <div class="d-flex justify-content-center  ">
          <h1 class="fw-bold">Contact us</h1>
        </div>
      </div>
    </div>
  </section>

  <main>
    <div class="container py-5">
      <div class="row g-5">
        <!-- Contact Information Block -->
        <div class="col-xl-6">
          <div class="row row-cols-md-2 g-4">
            <div class="aos-item" data-aos="fade-up" data-aos-delay="200">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-envelope h3 pe-2"></i>
                    <span class="h5">Email</span>
                  </div>
                  <span>example@domain.com</span>
                </div>
              </div>
            </div>
            <div class="aos-item" data-aos="fade-up" data-aos-delay="400">
              <div class="aos-item__inner">
                <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                  <div class="d-flex justify-content-start">
                    <i class="fa-solid fa-phone h3 pe-2"></i>
                    <span class="h5">Phone</span>
                  </div>
                  <span> 7081581570</span>
                </div>
              </div>
            </div>
          </div>
          <div class="aos-item mt-4" data-aos="fade-up" data-aos-delay="600">
            <div class="aos-item__inner">
              <div class="bg-light hvr-shutter-out-horizontal d-block p-3">
                <div class="d-flex justify-content-start">
                  <i class="fa-solid fa-location-pin h3 pe-2"></i>
                  <span class="h5">Office location</span>
                </div>
                <span>Indira Nagar Colony,SiddharthNagar</span>
              </div>
            </div>
          </div>
          <div class="aos-item" data-aos="fade-up" data-aos-delay="800">
            <div class="mt-4 w-100 aos-item__inner">
             

                <iframe  class="hvr-shadow" width="100%" height="345" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14184.493887614846!2d83.0907105!3d27.278007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3996c4af44c4fe91%3A0xce10af97e376a34a!2sIndira%20Nagar%2C%20Naugarh%2C%20Uttar%20Pradesh%20272207%2C%20India!5e0!3m2!1sen!2snp!4v1716004148316!5m2!1sen!2snp" ></iframe>
            </div>
          </div>
        </div>

        <!-- Contact Form Block -->
        <div class="col-xl-6">
          <h2 class="pb-4">Leave a message</h2>
          <form action="contect.php" method="post">
          <div class="row g-4">
            <div class="col-6 mb-3">
            
              <label for="exampleFormControlInput1" class="form-label">Fname</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="John">
            </div>
            <div class="col-6 mb-3">
              <label for="exampleFormControlInput1" class="form-label">Lname</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Doe">
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="+917061904567">
          </div>
          
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-dark">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </main>
';
}
else{
  echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <h1 class="text-center py-2">Contact Us.</h1>
    <h5 class="display-8">Please Login to Contact Us.</h5>
   
  </div>
</div>
  ';
}
?>
  


 


  <?php
  include('partials/footer.php');
  ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    
  </body>
</html>