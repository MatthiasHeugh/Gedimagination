<?php
session_start();
include 'mdp.inc.php';
//connection avec la base de donnée
$bd = mysqli_connect($connexion, $userName, $DBpassword, $DB);
//en cas d'erreur de connexion
if(mysqli_connect_errno($bd))
{
    echo mysqli_connect_error();
}
?>
<html lang="fr">
<!-- Page de compte du membre du site internet -->
<!--                compte.php                 -->
<!--  Matthias. H et Vincent. R le 23/11/2019  -->
<!--   dernière modification : 26/11/2019      -->
<head>
    <meta charset="utf-8">
    <title>Mon compte - GEDIMAGINATION </title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="align">
  <div class="grid">
    <form method="post" class="form login" action="upload.php" enctype="multipart/form-data">
      <header class="login__header">
        <h3 class="login__title">EN CONSTRUCTION</h3>
      <input type="file" name="photos" alt="poster une photo" accept="image/png, image/jpeg">
      <input type="submit" value="Poster" name="poster">
      </header>
    </form>
  </div>
</body>
</html>