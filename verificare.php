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

class Admin {
   public $id_admin;
   public $nume;
   public $parola;
}

$n = testare($_REQUEST["numeletau"]); 
$p = testare($_REQUEST["parolata"]);

if(isset($cnx)) {

   $cda= "SELECT * from admin";
   $stmt = $cnx->prepare($cda);
   $stmt->execute();
   $gasit = false;

   while ($utilizator = $stmt->fetchObject('Admin'))
    {
      if($utilizator->nume == $n && $utilizator->parola == $p) 
      {
         echo '<h1 class="italic centrat"><span class="litera italic"> S</span>unteti autorizat</h1><br />';
    echo '<form class="centrat" method="post" action="adaugare.php">';
         echo '<input type="submit" name="submit1" value="Adaugare">';
         echo '</form></center>';
         $gasit = true;
         break;
      }
   }
   if(!$gasit) 
   {
      echo '<h1 class="italic centrat"><span class="litera italic"> NU </span>aveti acces in baza de date</h1><br />';
      echo '<form class="centrat"><input type="button" value="Inapoi" onClick="location.href=\'login.html\'"></form></center>';
   }
   $cnx = null;
}

?>
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