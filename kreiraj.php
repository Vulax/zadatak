<?php
$connect = mysqli_connect("localhost" , "root", "", "listadogadjaja2");

if (isset($_POST['zavrsi'])){
  if (mysqli_query($connect, "INSERT INTO event (Ime, Tema_id, Slika, Opis, Mesto, Datum, Cena) VALUES ('$_POST[ime]', '$_POST[tip]', '$_POST[img]', '$_POST[opis]', '$_POST[mesto]', '$_POST[datum]', '$_POST[cenaulaznice]')")){
   header("Location:kreiraj.php");
   exit;
 }
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="header.css">
        <link rel="stylesheet" href="searchbar.css">
        
    </head>
    <body>

    <header class="header">
                 <a href="kreiraj.php" class="logo">dogadjaj</a>
                     <div class="afterlogo">
                         <div>
                             <input style="margin-top:12px;" type="text" placeholder="     Pretrazi dogadjaje . . ." required>
                         </div>
                 <input class="menu-btn" type="checkbox" id="menu-btn" />
                 <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                 <ul class="menu">
                     <li><a href="oNama.html">O nama</a></li>
                     <li><a href="finalEventList.php">Lista događaja</a></li>
                     <li><a href="kreiraj.php">Napravi događaj</a></li>
                 </ul>
             </header>

    <div class="flex">
      <div class="container">
        <form class="forme" method="POST">
          <label for="ime">Ime događaja</label><br>
          <input class="Polje" type="text" id="ime" name="ime" placeholder="Ime događaja . . ." autofocus required><br><br>
          <label for="tip">Tema događaja </label> <br>
          <select id="tip" size="1" name="tip">
            <option value="Umetnost">Umetnost</option>
            <option value="Komedija">Komedija</option>
            <option value="Radionica">Radionica</option>
            <option value="Ples">Ples</option>
            <option value="Nocni provod">Nocni provod</option>
            <option value="Film">Film</option>
            <option value="Fitness">Fitness</option>
            <option value="Hrana">Hrana</option>
            <option value="Video igrice">Video igrice</option>
            <option value="Vrticarstvo">Vrticarstvo</option>
            <option value="Zdravlje">Zdravlje</option>
            <option value="Literatura">Literatura</option>
            <option value="Muzika">Muzika</option>
            <option value="Umrezavanje">Umrezavanje</option>
            <option value="Zurka">Zurka</option>
            <option value="Religija">Religija</option>
            <option value="Kupovina">Kupovina</option>
            <option value="Sport">Sport</option>
            <option value="Pozoriste">Pozoriste</option>
            <option value="Nesto drugo">Nesto drugo</option>
          </select><br><br>

          <label for="img">Slika</label> <br>
          <input class="Polje img" type="text" id="img" name="img" placeholder="https://example-image.(jpg|png|svg)"><br><br>
          
          <label for="opis">Opis dogadjaja</label><br>
          <textarea class="Polje" row="4" id="opis" name="opis" placeholder="Opis događaja . . ." required></textarea><br><br>
          <label for="mesto">Mesto odrzavanja</label><br>
          <select id="mesto" name="mesto">
            <option value="Beograd">Beograd</option>
            <option value="Novi Sad">Novi Sad</option>
            <option value="Sabac">Sabac</option>
          </select><br><br>
          <label for="datum">Datum pocetka</label><br>
          <input type="date" id="datum" name="datum" max="2100-12-31"><br><br>
          <label for="cenaulaznice">Cena ulaznice</label><br>
          <input class="Polje" type="number" min="0" max="10000" id="cenaulaznice" name="cenaulaznice" placeholder="Cena ulaznice . . ."><br><br>
          <input type="submit" name="zavrsi" value="Organizuj događaj !" onclick="return mess()">
        </form>
      </div>
      <div class="slogan">
        <h1> Kreiraj <span> događaj za </span> <span style=" margin-left:50px; color:black; "> pamćenje! </span></h1>

        <p class="joke"></p>
        <button type="button" class="joke-generator">Joke</button>
      </div>
    </div>
    
    <script type="text/javascript">
      /*
      validation:

      min date
      is img found
      capitalize text inputs
      is valid url
      does url end with extensions
       */

      /* Joke generator */
      const jokeButton = document.querySelector('.joke-generator')
      const joke = document.querySelector('.joke')
      jokeButton.addEventListener('click', getJoke)
      function getJoke() {
        const url = 'https://official-joke-api.appspot.com/jokes/programming/random'
        fetch(url)
          .then(response => response.json())
          .then(([joke]) => joke)
          .then(({setup, punchline}) => {
            joke.innerHTML = setup + ' ' + punchline
          })
      }

      const dateInput = document.querySelector('#datum')
      const now = new Date().toISOString().substr(0, 10)
      dateInput.value = now
      dateInput.min = now

      function isImgFound() {
        altText = img.alt
        img.alt = '';
        const found = img.width !== 0;
        img.alt = altText;
        return found;
      }

      function capitalizeTextInputs() {
        const header = document.querySelector('#ime');
        header.value = header.value.substr(0, 1).toUpperCase() + header.value.substr(1)
        const body = document.querySelector('#opis');
        body.value = body.value.substr(0, 1).toUpperCase() + body.value.substr(1)
      }

      function mess(){
        if(!isImgFound()) {
          imgInput.value = defaultImgUrl
        }
        capitalizeTextInputs()

        alert("Vas zahtev se jos uvek obradjuje.");
        return true;
      }

      var imageExtensions = ['jpg', 'png', 'gif', 'svg', 'jpeg'];

      function createImgElement(src) {
        var img = document.createElement('img'); 
        img.src = src;
        
        img.style.maxHeight  = '200px';
        img.style.maxWidth = '200px';
        return img;
      }

      function createEmptyDiv() {
        var paragraph = document.createElement('div');
        return paragraph;
      }

      function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }  

      function validURL(str) {
        var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
          '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
          '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
          '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
          '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
          '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str) && imageExtensions.some((extension) => str.endsWith(extension));
      }

      var defaultImgUrl = 'https://i.ibb.co/7KQdPCp/1-w-MOt-Pw-RPga-Nf-KWi-SKPAw-JQ.jpg'

      var imgInput = document.querySelector('.img');
      var img = createImgElement('');
      insertAfter(img, imgInput);
      var paragraph = createEmptyDiv();
      insertAfter(paragraph, img); 
      
      imgInput.addEventListener("keyup", function(event) {
        if(validURL(imgInput.value)) {
            img.src = imgInput.value
        } else {
          img.alt = 'Default img will be displayed.'
          img.src =  '';
        }
      })
    </script> 
    
  </body>
</html>
