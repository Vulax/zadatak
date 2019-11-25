<?php
 $connect = mysqli_connect("localhost" , "root", "", "listadogadjaja2");
 $sql = "SELECT * FROM teme INNER JOIN event ON teme.Tema = event.Tema_id";  
 $result = mysqli_query($connect, $sql);  
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>

    <body>

<?php
$count=1;
while($row = mysqli_fetch_assoc($result)) { ?>
<br><br>
<?php echo $row["Ime"]; echo '  ';?> 
<?php echo $row["Tema"]; echo '  ';?>
<?php echo $row["Slika"]; echo '  ';?>
<?php echo $row["Opis"]; echo '  ';?>
<?php echo $row["Mesto"]; echo '  ';?>
<?php echo $row["Datum"]; echo '  ';?>
<?php echo $row["Cena"]; echo '  ';?>
<?php echo $row["ID"]; echo '  '; ?>


<a href="edit.php?ID=<?php echo $row["ID"]; ?>">Edit</a>


<a href="delete.php?ID=<?php echo $row["ID"]; ?>">Delete</a>

</tr>

<?php $count++; } ?>
        
        
    </body>
</html>
