<!DOCTYPE html>
<html>
<head>
  
<meta charset="UTF-8">
<title>E-sport.ro</title>
<link href="stil.css" rel="stylesheet">

</head>
<body>
   <div id="continut">

<header>
<a class="titlu" href="index.html">
<img src="imagini/titlu.png" alt="titlu" style="width:1377px;height:225px;"></a>

</header>
<?php 
  session_start();
 ?>

  <div id="continut_pag">
   <main>

   <?php 
    include("conn.php");
    function testare($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
    }

   class Clienti {
   
    public $parola;
    public $nume;
    
  }

 $cos = testare($_REQUEST['coscump']);
 $nume = testare($_REQUEST["num"]);
 $pw = testare($_REQUEST["pw"]);  //  Parola

 if(isset($cnx)) {
    $cda = "SELECT * FROM clienti";
    $stmt = $cnx->prepare($cda);
    $stmt->execute();
    //  Caut clientul in tabelul clienti

  $interogare = $cnx->prepare("SELECT * FROM clienti");
    $interogare->execute();
    $codcli = 0;
    while ($cli = $stmt->fetchObject('Clienti')) {
      if (strtoupper ($nume) == strtoupper ($cli->nume) && md5($pw) == $cli->parola) {
        $codcli = $cli->nume;
        break;
      }
  }
  
    $articole = explode(',',$cos);
    foreach ($articole as $item) {
      // Caut produsul in baza de date dupa $item
            date_default_timezone_set('Europe/Bucharest');
            $data = date('Y-m-d'); // data in format aaaa-ll-dd
            $interogare1 = $cnx->prepare("INSERT INTO COMENZI VALUES
                (NULL, '$codcli', '$item', '1', '$data')");
            $interogare1->execute();
        }
        echo '<h1 class="italic centrat"><span class="litera italic">C</span>';
   echo 'omanda a fost preluată pe numele <span class="litera italic">'.$nume.'</span> <br />Coletul dumneavoastră va ajunge în maxim 3 zile lucrătoare';
   echo ' <br />Va multumim!</h1><br />';
        // Golesc cosul memorat in $_SESSION['cos_cumparaturi']
    unset($_SESSION['cos_cumparaturi']);
  } else {
        echo '<h1 class="italic centrat">';
        echo 'Nume utilizator sau parola eronata!</h1>';
        echo '<br /><input id="btn" type="button" value = "Reintroduc datele" ';
        echo 'onclick="return fclick()" /<<br />';
  }
  $cnx = null;

?>
<br /><br /><br /><br /><br />
<div class="livrare">

</div>
     

</main>
 <nav> <!-- Plasat pe coloana din dreapta! -->
     <h1>Sporturi</h1>
       <ul>
         <li><a class="link" href="Fotbal.php">Fotbal</li></a>
         <li><a class="link" href="Tenis.php">Tenis</li></a>
         <li><a class="link" href="Handbal.php">Handbal</li></a>
         <li><a class="link" href="Ski.php">Ski</li></a>
       </ul>
       </nav>
       </div>
<footer>
   <p style="font-family:arial; color: white; font-size: 150%">Site proiectat de Vădan Radu Dan.
     © I.A.P. 2019 </p>
  </footer>
</body>
</html>