<html lang="fr">

<!-- Page de d'inscription au site internet -->
<!--           inscription.html             -->
<!--        Matthias. H le 23/11/2019       -->

<?php
$mail = "";
$nom = "";
$prenom = "";
$telephone="";
$ville="";
$code_postal="";
$mdp="";
$admin=0;
//connection avec la base de donnée
$bd = mysqli_connect('localhost', 'root', '', 'test');
//en cas d'erreur de connexion
if(mysqli_connect_errno($bd))
{
    echo mysqli_connect_error();
}
?>

<head>
		<meta charset="utf-8">
        <title>Inscription - GEDIMAGINATION </title>
        <link rel="stylesheet" href="style.css">
</head>
<body class="align">

    <div class="grid">
  
      <form method="post" class="form login">
  
        <header class="login__header">
          <h3 class="login__title">S'inscrire</h3>
        </header>
  
        <div class="login__body">
  
          <div class="form__field">
            <input name="email" type="email" placeholder="Email" required>
          </div>
  
          <div class="form__field">
            <input name="password" type="password" placeholder="Password" required>
          </div>

          <div class="form__field">
            <input name="nom" type="nom" placeholder="Nom" required>
          </div>

          <div class="form__field">
            <input name="prenom" type="prenom" placeholder="Prenom" required>
          </div>

          <div class="form__field">
            <input name="telephone" type="telephone" placeholder="Téléphone" required>
          </div>

          <div class="form__field">
            <input name="ville" type="ville" placeholder="Ville" required>
          </div>

          <div class="form__field">
            <input name="cp" type="cp" placeholder="Code Postal" required>
          </div>
  
        </div>
  
        <footer class="login__footer">
          <input type="submit" value="Inscription">
  
          <p><span class="icon icon--info">?</span><a href="connexion.php">Déjà inscrit ?</a></p>
        </footer>
  
      </form>
  
    </div>
  
  </body>




<?php
if(isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['password']))
{
  	//AAAAAAAAAAAAAAAAAAAAAAAH
    $mail = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['cp'];
    $mdp = $_POST['password'];
    //requête pour ajouter une section dans la base de données
    $sql = 'INSERT INTO membre(mail, nom, prenom, telephone, ville, code_postal, mot_de_passe, admin) VALUES("'.$mail.'", "'.$nom.'", "'.$prenom.'", "'.$telephone.'", "'.$ville.'", "'.$code_postal.'", "'.$mdp.'", "'.$admin.'");';
    //en cas d'erreur
    mysqli_query($bd,$sql) or die('Erreur SQL !'.$sql.'<br>'.mysqli_error($bd));
}
?>