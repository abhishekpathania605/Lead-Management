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
            background-image:url("images/details.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            align-items: center;
            justify-content: center;
            

        }
        .blurred-overlay {
         backdrop-filter: blur(10px); /* Blurs the content behind this element */
        /* ... other styling for the overlay ... */
    }
  table, th, td {

border:1px solid black;
border-collapse: collapse;
text-align: center;
font-size: 10px;
grid-template-columns: 100px 150px 100px 100px 100px 1fr;
font-size: larger;

}
th, td {
    padding: 10px;  
}
th {
  color:rgba(104, 53, 6, 1);  
  padding: 10px;  
  background-color:rgba(244, 217, 192, 1);
}
table{
  
     color:black;
     margin-left: 150px;
     margin-top: 50px;
      text-shadow: 0.07em 0 red, 0 0.07em red, -0.01em 0 red, 1 -0.01em red;
     
}
    </style>
<body class="blurred-overlay">
    
    <nav>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" >
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
<div id="header">
  <h3 style="border: 0px solid black;align-items:center;justify-content:center;text-align:center;background-color: rgba(155, 162, 168, 0.17)">All Customers Details</h3>
</div>
</body>
</html> 

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "crud";
$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
//echo "Connection stablished";
$getdata = "Select * from leads";
$getdata_result = mysqli_query($conn, $getdata);
$total = mysqli_num_rows($getdata_result);
//echo $total;
// In case if you want to store data in arrays for other purposes.
// $ids = array();
// $first_name = array();
// $last_name = array();
// $phone = array();
// $email = array();
// $comments = array();
if($getdata_result){
//echo "data received";
echo '<div id= "detail">';
//echo '<table class="table">';
echo '<table>';
echo '<thead>';
echo '<tr style="text-align: center;">';
echo '<th scope="col">Sr.No</th>';
echo '<th scope="col">Id</th>';
echo '<th scope="col">First Name</th>';
echo '<th scope="col">Last Name</th>';
echo '<th scope="col">Phone</th>';
echo '<th scope="col">Email</th>';
echo '<th scope="col">Comments</th>';
echo '</tr>';
$j =0;       
for($i=0; $i<$total;$i++){
  $show = mysqli_fetch_assoc($getdata_result);
  //echo var_dump($show);
  $j++;
echo '<tbody>';
echo '<tr>';
echo '<td scope="row">' . $j .'</td>';
echo '<td>' .$show["Id"].'</td>';
echo '<td>'. $show["Fist_Name"].'</td>';
echo '<td>'.$show["Last_Name"].'</td>';
echo '<td>'.$show["Phone"].'</td>';
echo '<td>'.$show["Email"].'</td>';
echo '<td>'.$show["Comments"].'</td>';


// In case if you want to store data in arrays for other purposes.
//   array_push($ids, $show["Id"]);
//   array_push($first_name, $show["Fist_Name"]);
//   array_push($last_name, $show["Last_Name"]);
//   array_push($phone, $show["Phone"]);
//   array_push($email, $show["Email"]);
//   array_push($comments, $show["Comments"]);
  
}
echo ' </thead>';
echo '<tbody>'; 
echo '</tbody>';
echo '</table>';
echo '</div>';

// In case if you want to see the data in arrays for other purposes that you have created.
// echo var_dump($ids);
// echo var_dump($first_name);
// echo var_dump($last_name);
// echo var_dump($phone);
// echo var_dump($email);
// echo var_dump($comments);
}else{
  die("data not received".mysqli_error($conn));
}


}else{
  die("Connection Error".mysqli_connect_error($conn));
}

?>

