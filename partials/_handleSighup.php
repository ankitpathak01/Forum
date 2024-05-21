<!-- INSERT INTO `users` (`sno`, `name`, `role`, `email`, `password`, `date`) VALUES (NULL, 'Shiva', 'user', 'shiva12@gmail.com', '1', current_timestamp()); -->


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
$showerror="false";

if($method=="POST"){
   $username=$_POST['username']; 
   $useremail=$_POST['useremail']; 
   $password=$_POST['password']; 
   $role=$_POST['role'];
   $confirmpassword=$_POST['cpassword']; 
  $existsql="SELECT * FROM `users` WHERE email='$useremail'";
  $result=mysqli_query($conn,$existsql);
  $rows=mysqli_num_rows($result);
  
  if($rows>0){
    $showerror="Email Address Already Exist";
  }
  else{
    if($password==$confirmpassword){
        // $hash=password_hash($password,PASSWORD_DEFAULT);
        // $sql="INSERT INTO `users` ( `name`,`role`,`email`, `password`,`date`,) VALUES ( '$username','$role', '$useremail','$password' , current_timestamp())";
        $sql="INSERT INTO `users` ( `name`, `role`, `email`, `password`, `date`) VALUES ( '$username', '$role', '$useremail', '$password', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        if($result){
            $showAlert=true;
            header('Location:/FORUM/index.php?signupsuccess=true');
            exit();
        }
    }
    else{
        $showError="Password do not match";
    }
  }
 
  header('Location:/FORUM/index.php?signupsuccess=false &error= $showError');

}

?>