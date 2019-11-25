<?php
$connect = mysqli_connect("localhost" , "root", "", "listadogadjaja2");
$id=$_REQUEST['ID'];
$query = "DELETE FROM event where ID=$id"; 
$result = mysqli_query($connect, $query);
header("Location: eventList.php");
?>