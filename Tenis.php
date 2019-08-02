<!DOCTYPE html>
<html>
<head>
  
<meta charset="UTF-8">
<title>E-sport.ro-Tenis</title>
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
<h1> Tenis</h1>
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
  $cda= "SELECT * from produse WHERE id_categ =2";
  $stmt = $cnx->prepare($cda);
  $stmt->execute();
  echo "<div class=\"imagini\">";
  while ($prod = $stmt->fetchObject('Produse')) {
  $img = $prod->imagine;
  $id = $prod->id_produs;
  echo '<a class="imagine" href="element.php?idprod='.$id.'" class=\"balon-nike-strike\"><img src="imagini/'.$img.'" alt=""/></a>';
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