<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="idiscuss";

$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$method=$_SERVER['REQUEST_METHOD'];
if($method=="POST"){
    $email=$_POST['useremail'];
    $password=$_POST['password'];
    $sql="SELECT * FROM `users` WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    
    $Numrow=mysqli_num_rows($result);
    if($Numrow==1){
        $row=mysqli_fetch_assoc($result);
        $pass=$row['password'];
        $email=$row['email'];
        $role=$row['role'];
        $sno=$row['sno'];
        if($password==$pass && $role=="user"){
            session_start();
            $_SESSION['loggedIn']=true;
            $_SESSION['useremail']=$email;
            $_SESSION["sno"]=$sno;
            $_SESSION["role"]=$role;

            header('Location:/FORUM/index.php');
            }  
            elseif($password==$pass && $role=="admin"){
              session_start();
              $_SESSION['loggedIn']=true;
              $_SESSION['useremail']=$email;
              $_SESSION["sno"]=$sno;
              $_SESSION["role"]=$role;
  
              header('Location:/FORUM/admin.php');
              } 
            

         else{
           header('Location:/FORUM/index.php?LoginFail=false ');
        }   
        
    }
   
}



?>