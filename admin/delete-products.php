<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$query=mysqli_query($con,"SELECT role_id FROM admin WHERE id='".$_SESSION['id']."'");
$role_id=mysqli_fetch_array($query)[0];
if($role_id!=1 && $role_id!=4)
	header('location:access-denied.php');

    mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  echo "Product deleted !!";
}