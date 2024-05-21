<?php
// deleteid

$servername = "localhost";
$username = "root";
$password = "";
$database="idiscuss";


$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="Delete from `users` where sno=".$id;
    $result=mysqli_query($conn,$sql);
    if($result){
        header('Location:admin.php');
        echo'<div class="alert alert-succuss" role="alert">
  Data Deleted successfully..
</div>';
    }

}
?>