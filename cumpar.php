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
     
function testare($data) {
   $data = trim($data); 
   $data = stripslashes($data); 
   $data = htmlspecialchars($data); 
   return $data; 
}

     class Produse {
    public $id_produs;
    public $imagine;
    public $id_categ;
    public $produs;
    public $material;
    public $preț;
  }
  // Adaug produsul in cos
$element = testare($_REQUEST['id_produs']);
$gasit = false;
if(isset($_SESSION['cos_cumparaturi'])) {
   $cos = $_SESSION['cos_cumparaturi'];
   // Verific daca produsul este deja in cos
   // explode realizeaza fragmentarea unui sir de caractere folosind 
   // separatorii continuti in alt sir
   // separatorul este ','
   // $cos este un sir de caractere (coduri de produs separate prin ',')

   $articole = explode(',',$cos); 
   foreach ($articole as $item) {  //prelucrez elementul curent, $item
      if($item == $element) {
         $gasit = true;
         break;
      }
   }
   if(!$gasit) {
      $cos = $cos.','.$element;
   } 
} else {
   $cos = $element;
}
$_SESSION['cos_cumparaturi'] = $cos;
// afisez continutul cosului
// ma conectez la b.d. pentru a prelua numele si pretul produsului
// pana la conexiunea cu db am preluat doar id_produs

include("conn.php");
if(isset($cnx)) {
  $vtotal = 0;
  $articole = explode(',',$cos);

  echo '<h1 class="italic centrat">';
  echo '<span class="litera italic">Ai</span> ales urmatoarele produse </h1><br />';
  echo '<table class="login centrat">';
  foreach ($articole as $item) {
    // Caut produsul in baza de date dupa $item

    $cda= "SELECT * from produse WHERE id_produs =$item";
      $stmt = $cnx->prepare($cda);
      $stmt->execute();
      //  Exista un singur produs
    $prod = $stmt->fetchObject('Produse');
    echo '<tr><td>'.$prod->produs.'</td><td><nobr>'.
      $prod->preț.'lei</nobr></td></tr>';
    $vtotal += (double)$prod->preț;
  }
  echo "</table><br /><br />";
  echo '<p class="centrat">Produsele costă '.
           $vtotal." lei.</p>";
}
?>
  <br /><br /><br />

  <p class="centrat"><a class="link" href="comanda.php">Achiziționez produsele</a> 
     
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