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
<h1 class="italic centrat"><span class="litera italic">A</span>daugare</h1><br />
         <form name="formular" enctype="multipart/form-data" method="post" action="inserare.php" class="centrat">
           <table class="login centrat">
            <tr>
               <td>Categoria:</td>
               <td> 
                    <select name="combo">
                        <option selected value="initial">(Alege categoria)</option>
                        <?php
include("conn.php");

class Categorii {
   public $id_categ;
   public $categoria;
}

if(isset($cnx)) {
   $cda= "SELECT * FROM categorii";
   $stmt = $cnx->prepare($cda);
   $stmt->execute();
   while ($categ = $stmt->fetchObject('Categorii')) {
    echo '<option value="' . $categ->id_categ . '">' . $categ->categoria . '</option>\n';
   }
   $cnx = null;
}
?>
                        
                    </select>
               </td>
           </tr>

           <tr>
               <td>Selectati imaginea:</td>
               <td><input type="file" name="fisier"  /></td>
           </tr>
           <tr>
              <td>Nume produs:</td>
              <td><input type="text" name="nume"/></td>
            </tr>
            <tr>
              <td>Material:</td>
              <td><input type="text" name="material"/></td>
            </tr>
            <tr>
              <td>Pret:</td>
              <td><input type="text" name="preț"/></td>
            </tr>

            <tr>
                <td><input type="submit" name="Submit" value="Adauga"></td>
                <td><input type="reset" name="Reset" value="Sterge"></td>
           </tr>
        </table>
      </form>
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