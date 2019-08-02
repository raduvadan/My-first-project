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

     class Produse {
    public $id_produs;
    public $imagine;
    public $id_categ;
    public $produs;
    public $material;
    public $preț;
  }
  if(isset($cnx)) {
   $idp = $_REQUEST['idprod'];
          $cda = "SELECT * from produse WHERE id_produs=$idp"; 
          $stmt = $cnx->prepare($cda);
          $stmt->execute();
          $prod = $stmt->fetchObject('produse');
          echo "<article class=\"produs\"><h1>$prod->produs</h1>";
          echo "<div class=\"mostra\">";
          echo '<img src="imagini/'.$prod->imagine.'" alt="" />';
          echo "</div>";

          echo "<div class=\"descriere\">";
          echo "<h2>Material</h2><p>$prod->material</p>";
          echo '<h2>Preț</h2><p class="bold">'.$prod->preț.' lei</p>';
          echo "</div>";

          echo '<div class="pret"><a class="link" href="cumpar.php?id_produs='.$idp.'">Adăugare în coș</a></p></div>';
          echo "</article>";
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