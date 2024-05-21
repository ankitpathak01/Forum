<?php
include('dbconnect.php');
session_start();
include('partials/loginModal.php');
include('partials/SighupModal.php');
include('partials/categoryModel.php');

echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/Forum">helpAll</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Forum">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contect.php">Contect</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="Select category_name,category_id from `categories` LIMIT 4";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
          echo'
          
            <a class="dropdown-item" href="threadlist.php?catid='.$row["category_id"].'">'.$row["category_name"].'</a>';
            
          

        }

        echo'
        </div>
      </li>
      
    </ul>';

  
    
    
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true ){
             echo'
             <button class="btn btn-outline-success my-2 mx-2" data-toggle="modal" data-target="#CatModel">Add Catagory</button>
             <form class="form-inline my-2 my-lg-0" action="search.php" Method="get" >
             <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
             <p class="text-light my-2 mx-2"> Welcome  '.$_SESSION['useremail'].'</p>
             <a href="/forum/partials/_handleLogout.php" class="btn btn-outline-danger" >LogOut</a>
             </form>
           ';
    }else{
      echo'<div class="mx-2">
      <button class="btn btn-outline-success" data-toggle="modal" data-target="#loginModel">Login</button>
      <button class="btn btn-outline-primary" data-toggle="modal" data-target="#SignupModel">Signup</button>
  </div>';
    }
       
    
    
echo'
  </div>
</nav>';

if(isset($_GET["signupsuccess"]) && $_GET['signupsuccess']=="true"){
  echo'<div class="alert alert-success my-0" role="alert">
You can now log in.
</div>';
}
if(isset($_GET["Catsuccess"]) && $_GET['Catsuccess']=="true"){
  echo'<div class="alert alert-success my-0" role="alert">
New Category Added.
</div>';
}
if(isset($_GET["LoginFail"]) && $_GET['LoginFail']=="false"){
  echo'<div class="alert alert-danger my-0" role="alert">
Login Failed Please type your email and password correctly.
</div>';
}

?>

