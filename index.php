<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>CRUD Application</title>
</head>
<style>
        body{
            background-image:url("images/contact.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .blurred-overlay {
         backdrop-filter: blur(5px); /* Blurs the content behind this element */
        /* ... other styling for the overlay ... */
    }
  table, th, td {
border:1px solid black;
border-collapse: collapse;
text-align: center;
font-size: 15px;
grid-template-columns: 100px 150px 100px 100px 100px 1fr;
font-size: larger;

}
th, td {
    padding: 10px;  
}
table{
  
  color:chocolate;
      text-shadow: 0.07em 0 black, 0 0.07em black, -0.01em 0 black, 1 -0.01em black;
     
}
    </style>
<body style="background-color: rgba(225, 225, 215, 1);">
    
    <nav>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.html">CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <a class="nav-link" href="index.php">Fill Your Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="view.php">All People</a>
        </li>               
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    </nav> 
<?php
if(isset ($_POST["fname"]) && isset ($_POST["lname"]) && isset ($_POST["phone"]) && isset ($_POST["email"]) && isset ($_POST["other"])){
//echo "All parameters are received";
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$other = $_POST["other"];
// echo $fname, $lname, $phone, $email, $other;

$servername = "localhost";
$username = "root";
$password = "";
$database = "CRUD";
$conn =  mysqli_connect($servername,$username,$password,$database);
if($conn){
//echo "Connection stabilished";
$send = "INSERT INTO leads(Fist_Name,Last_Name,Phone,Email,Comments)values('$fname','$lname','$phone','$email','$other')";
$send_result = mysqli_query($conn,$send);
if($send_result){

    // Multiple alerst below
//echo "Hey ! Your details has been submitted";
// echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-0">
//   Hey ! Your details has been submitted
// </div>';

// echo '<div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-0">';
// echo "Congrats". " ". $fname. "! Your details has been submitted";
// echo '</div>';

echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';

echo "Congrats" . " " ."<strong>"."$fname". "!</strong> You details has been submitted successfully";
//echo '<a href="view.php"> Click here to see other detais</a>';
echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>';


}else{
    echo "Data has Not insertes. Error".mysqli_error($conn);
}

}else {
    die ("Not able to connect with database due to". mysqli_connect_error($conn));
}
}else{
    //echo "All parameters are not received";
}
?>

    <div id="container1" style="margin-top:50px;margin-left:25%;border:0px solid red;width:50%;justify-content:center;align-items:center;padding:30px;background-color: rgba(163, 163, 147, 1);">
        <form action="index.php" method="post">
  <div class="mb-3">
    <label for="First_Name" class="form-label">First Name</label>
    <input type="text" class="form-control" name="fname" id="fnanme" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="Last_Name" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="lname" id="lnanme">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" id="phone">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="email" >
  </div>
  <div class="mb-3">
    <label for="other" class="form-label">Any Additional Comments</label>
    <input type="text" class="form-control" name="other" id="other">
  </div>  
  <a href="home.html">
  <button style="align-items: center;justify-content:center;margin-left:50%" type="submit" class="btn btn-primary">Submit Details</button></a>
</form>  
</div>
<div id="footer" style="margin-top: 21.5px">
    <div class="card text-center">
  <div class="card-header">
    Copyright ©2025 Abhishek Pathania
  </div>
    </div>
</body>
</html>




