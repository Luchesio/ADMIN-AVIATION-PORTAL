<?php 
include("connection.php");

$stmt = $con->prepare("SELECT * FROM ticket ");
$stmt->execute();

$featured_products =$stmt->get_result();

?>