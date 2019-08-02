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
   function testare($data) {
      $data = trim($data); 
      $data = stripslashes($data); 
      $data = htmlspecialchars($data); 
      return $data; 
   }
   if (testare($_FILES["fisier"]["error"]) > 0) {
      echo "Error: " . $_FILES["fisier"]["error"] . "
"; 
      exit; 
   }
   
   $numeimagine = testare($_FILES["fisier"]["name"]); 
   $poz = strrpos($numeimagine, "."); 
   $extensie = substr ($numeimagine, $poz); 
   $nmtmp = $_FILES["fisier"]["tmp_name"]; 
   $categoria = testare($_REQUEST["combo"]); 
   $produs = testare($_REQUEST["produs"]); 
   $material = testare($_REQUEST["material"]); 
   $pretul = testare($_REQUEST["preț"]);
   
   include("conn.php");
   if(isset($cnx)) {
   $cda= "INSERT INTO produse ( imagine, id_categ, produs, material, preț) VALUES (null, :imagine, :idcateg, :produs, :material, :preț)";
   $stmt = $cnx->prepare($cda); 
   $stmt->bindParam(':imagine', $numeimagine, PDO::PARAM_STR);
   $stmt->bindParam(':idcateg', $categoria, PDO::PARAM_STR); 
   $stmt->bindParam(':produs', $produs, PDO::PARAM_STR); 
   $stmt->bindParam(':material', $material, PDO::PARAM_STR);
   $stmt->bindParam(':preț', $pretul, PDO::PARAM_STR);
   // se foloseste PARAM_STR chiar si pentru numere 
   // Preiau ID-ul pozei introduse in baza si construiesc un nou nume 
   $id = $cnx->lastInsertId(); 
   $numeimaginenou = "imagine".$id.$extensie; 
   $cda = "UPDATE produse SET imagine='$numeimaginenou' WHERE id_produs = $id";
   $stmt = $cnx->prepare($cda); 
   $stmt->execute();
   // Construiesc calea pe care sa incarc fisierul 
   $cale = "imagini/$numeimaginenou"; 
   $rezultat = move_uploaded_file($nmtmp, $cale); 
   if (!$rezultat) { 
      echo "Eroare la incarcarea fisierului"; 
      exit; 
   }
   
   echo "<p class=\"inserare centrat\">";
   echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">P</span>rodusul<br />s-a adaugat in baza de date</h1><br />";
   echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"
      onClick=\"location.href='adaugare.php'\">";
   echo "<input type=button value=\"Home\" onClick=\"location.href='index.html'\"></form>";
   echo "</p><br /><br />";
   echo "<p class=\"inserare centrat\">Numele vechi al fisierului: $numeimagine</p>";
   echo "<p class=\"inserare centrat\">Categoria fisierului: $categoria</p>";
   echo "<p class=\"centrat inserare\">Noul nume al fisierului: $numeimaginenou</p>";
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
       <h1>Administrare</h1>
       <ul>
       <li><a href="login.html">Baza de date</li></a>
       <ul>
       </nav>
       </div>
<footer>
   <p style="font-family:arial; color: white; font-size: 150%">Site proiectat de Vădan Radu Dan.
     © I.A.P. 2019 </p>
  </footer>
</body>
</html>