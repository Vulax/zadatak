<?php
 $connect = mysqli_connect("localhost" , "root", "", "listadogadjaja2");
 $sql = "SELECT * FROM teme INNER JOIN event ON teme.Tema = event.Tema_id";  
 $result = mysqli_query($connect, $sql);  
?>

<html>
<head>
<title>EVENTS</title>
<link href="Stil5.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="searchbar.css">
		<link rel="stylesheet" href="allEvents.css">
</head>
<body>
                
                <header class="header">
                 
					<a href="index.html" class="logo"><b>za</b>Kulturu.</a>
						<div class="afterlogo">
							<div>
								<input type="text" placeholder="     Pretrazi dogadjaje . . ." style="width:31px;
								height:31px;"required/>
							</div>
					<input class="menu-btn" type="checkbox" id="menu-btn" />
					<label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
					<ul class="menu">
						<li><a href="oNama.html">O nama</a></li>
						<li><a href="kreiraj.php">Kreiraj događaj!</a></li>
						<li><a href="finalEventList.php">Svi događaji!</a></li>
					</ul>
				</header>

		
            <br>
            <?php
        echo '<div class="kontenjer">';
        $count=1;
        while($row = mysqli_fetch_assoc($result)) { ?>
            <br>
			<div class="div1 btn display1">
				<div class="dis">
						<img src="<?php echo $row["Slika"]; ?>"  class="image"/>
				</div>
				<div class="pad dis">
						<echo class="naslov boldd"><?php echo $row["Ime"]; ?>,<?php echo date(" l jS \of F Y", strtotime($row["Datum"])); ?></span></echo>
						<div class="prostor"></div>
						<echo class="naslov"><?php echo $row["Opis"]; ?></echo>
						<br>
						<echo class="naslov poz text" style='bottom:20px; left:80%;'><?php echo $row["Cena"]; ?>RSD</echo>
						
				</div>
			</div>
		
        <?php $count++; 
        } ?>
        </div>
</body>
</html>