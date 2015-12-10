<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
   <head>
      <!-- JavaScript library JQuery from Google Code service -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
      <script src="javascript.js"></script>
      <link rel="stylesheet" href="style.css">
      <link href="http://omsk.zz.mu/images/star.png" rel="shortcut icon" type="image/x-icon" />
      <link href='http://fonts.googleapis.com/css?family=Play&subset=latin,cyrillic' rel='stylesheet' type='text/css'> <!-- шрифт от гугл -->
      <!-- Русская кодировка -->
      <meta charset="utf-8">
   </head>
        <body>
        <header>Leaders of the Soviet Union</header>
                <?php
                      //poluchaem imya vozjdu v kavychkah iz URL
                      $GetName = "'" . $_GET['Name'] . "'";
                    
                     //tut hranyatcy host, login, password etc
                     require_once "login.php";

                     //sozdaem object dlya soedinenia s basoy dannyh
                     $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                     //esli oshibka soedinenia to vyvodim oshibku
                     if ($connection->connect_error) die($connection->connect_error);

                     // Poluchaem dannye iz DB v zavisimosti ot znachenia Name v Url
	                   $query = "SELECT * FROM UssrLeaders WHERE Name = " . $GetName;
                     //$query = "SELECT * FROM UssrLeaders";
                     
	                   //otpravlyem zapros serveru i soxranyem otvet v vide obekta v result 
	                   $result = $connection->query($query);

                     //Esli result pust to vyvodim oshibku
                     if (!$result) die($connection->error);
                  
                     //spisok imen
                     $row = $result->fetch_row();
                     //$obj = $result->fetch_object();

                     //Vyvodim informaciyu po vozjdu
echo <<<_END
                     <div class='image'>
                      <figure>
                        <img src='/images/Photo/$_GET[Name].jpg' height = 15% width = 15%></img>
                        <figcaption> $_GET[Name] </figcaption>
                      </figure>
                     </div>
                     <dt>NAME:</dt><dd> $row[1] </dd>
                     <dt>NOTES:</dt><dd> $row[4] </dd>

_END;
                    //echo $test = 2 > 5 ? TRUE : FALSE;
                    //echo (bool) '';
                     //Zakryvaem soedinenie s BD
                     $connection->close(); 
                 ?>

<footer>
  <div class="info">
    <div>КОНТАКТЫ<br>
        Телефон +7(981)701-26-17<br>
        E-mail donnieddonnied@gmail.com<br>
    </div>
    <br>
    <br>
    <br>
    <div>©  Владимир Мычко 2015 – All Rights Reserved</div>
  </div>
</footer>
</body>
