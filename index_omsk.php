<!DOCTYPE html>
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
                     //tut hranyatcy host, login, password etc
                     require_once "login.php";

                     //sozdaem object dlya soedinenia s basoy dannyh
                     $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                     //esli oshibka soedinenia to vyvodim oshibku
                     if ($connection->connect_error) die($connection->connect_error);

                     // text zaprosa
	                   $query = "SELECT * FROM UssrLeaders";

	                   //otpravlyem zapros i soxranyem otvet v vide obekta v result 
	                   $result = $connection->query($query);

                     //Esli result pust to vyvodim oshibku
                     if (!$result) die($connection->error);
                     
                     //chislo vseh rydov tablicy
                     $rows = $result->num_rows;
                     
                     echo "<div class='menu'>";
                     //spisok imen
                     for($j = 0; $j < $rows; ++$j)
                     {
                      //poisk nujnoi stroki
                      $result->data_seek($j);

                      //izvlekaem ryad po nazvaniu stolbca
                      $row = $result->fetch_array(MYSQLI_ASSOC);

                      //sozdaem spisok ssylok
                      $strName = $row['Name'];
                      // Создать ссылку на person.php с Name-value в URL
                      $strLink = "<a href = 'info.php?Name=" . $row['Name'] . "'>" . "<div class='list'>" . $strName . "</div>" . "</a>";
                      //listing ssylok
                      echo $strLink;
                     }
                     echo "</div>";
                 ?>
                
<div id=leftText>
  Сайт выполнен: 
  <ul>
      <li>На PHP</li>
      <li>С использованием MySQL</li>
      <li>С использованием HTML5</li>
      <li>С использованием CSS3</li>
      <li>Без использования JQuery</li>
  </ul>
</div>

<?php
  echo "<a href = 'test.php'>" . "<div>TEST</div>" . "</a>";
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
