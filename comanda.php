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
   <h1 class="italic centrat">
<span class="litera italic">A</span>utentificare client</h1><br />



 <form action="memorez1.php" method="post" class="centrat">
     <table class="login centrat">
<?php 
include("conn.php");
class Comenzi{
 public $cos;
  }

   echo '<input type= "hidden" name = "coscump" value = '.$cos.'>';
?>    
        <tr>
          <td>Nume </td>
          <td><input type="text" name = num></td>
        </tr>

        <tr>
          <td>Parola Dv. </td>
         <td><input type="password" name = pw></td>
        </tr>

       <tr>
          <td colspan = 2 class="centrat">
          <input type="submit" name ="trimit1"  value = "Comanda"></td>
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
       </nav>
       </div>
<footer>
   <p style="font-family:arial; color: white; font-size: 150%">Site proiectat de Vădan Radu Dan.
     © I.A.P. 2019 </p>
  </footer>
</body>
</html>