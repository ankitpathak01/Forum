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

$method=$_SERVER['REQUEST_METHOD'];


if($method=="POST"){
   $Cat_name=$_POST['category_name']; 
   $Cat_desc=$_POST['category_description']; 
  
  
  $existsql="SELECT * FROM `categories` WHERE category_name='$Cat_name'";
  $result=mysqli_query($conn,$existsql);
  $rows=mysqli_num_rows($result);
  
  if($rows>0){
    $showerror="Category Already Exist";
  }
  else{
    
        // $hash=password_hash($password,PASSWORD_DEFAULT);
        // $sql="INSERT INTO `users` ( `name`,`role`,`email`, `password`,`date`,) VALUES ( '$username','$role', '$useremail','$password' , current_timestamp())";
        $sql="INSERT INTO `categories` ( `category_name`, `category_description`, `created`) VALUES ('$Cat_name', ' $Cat_desc', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showAlert=true;
            header('Location:/FORUM/index.php?catsuccess=true');
            exit();
        }
    
    else{
        $showError="Password do not match";
    }
  }
 
  header('Location:/FORUM/index.php?Catsuccess=false &error= $showError');

}

?>