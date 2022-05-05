<?php
session_start();
error_reporting(0);
include('include/config.php');
$logged_in = true;
if(strlen($_SESSION['alogin'])==0)
{   
    $logged_in = false;
}

$id = $_SESSION['id'];
$query=mysqli_query($con,"SELECT role_id FROM admin WHERE id={$id}");
$role_id=mysqli_fetch_array($query)[0];

$query=mysqli_query($con,"SELECT role_name FROM roles WHERE id={$role_id}");
$role=mysqli_fetch_array($query)[0];
?>
<html>
    <head>
        <style>
            body{
                margin: 100px;
            }
            h1{
  margin-top: -100px;
  margin-bottom: 20px;
  color: #00072D;
  text-align: center;
  font-family: 'Raleway';
  font-size: 90px;
  font-weight: 800;
}
h2{
  color: #6A8D92;
  text-align: center;
  font-family: 'Raleway';
  font-size: 30px;
  text-transform: uppercase;
}
h3{
  color: #FFFFF2;
  background-color: #FF8811;
  text-align: center;
  font-family: 'Raleway';
  font-size: 20px;
  text-transform: uppercase;
}
        </style>
    </head>
<body>
<h1>403</h1>
<h2>access forbidden!</h2>
<h3>
    <?php
        if(!$logged_in)
            echo "You cannot access this page without signing in.";
        else
            echo "This page is not accessible to '$role' role.";
    ?>
</h3>
</body>
</html>