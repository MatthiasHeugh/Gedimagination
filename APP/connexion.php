<?php session_start() ?>
<html lang="fr">
<!--    Page de connexion au site internet   -->
<!--            connexion.php                -->
<!-- Matthias. H et Vincent. R le 23/11/2019 -->
<!--   dernière modification : 02/12/2019    -->
<head>
		<meta charset="utf-8">
        <title>Connexion - GEDIMAGINATION </title>
        <link rel="stylesheet" href="style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="align">
    <div class="grid">
      <form method="post" class="form login">
        <header class="login__header">
          <h3 class="login__title">Se connecter</h3>
        </header>
        <div class="login__body">
          <div class="form__field">
            <input type="email" placeholder="Email" name="mail" required>
          </div>
          <div class="form__field">
            <input type="password" placeholder="Password" name="password" required>
          </div>
        </div>
        <footer class="login__footer">
          <input type="submit" value="Connexion">
          <p><span class="icon icon--info">?</span><a href="inscription.php">Pas encore inscrit ?</a></p>
        </footer>
      </form>
    </div>
  </body>
</html>
<?php
include 'mdp.inc.php';
if(!empty($_POST['mail']))
{
  // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
  if(empty($_POST['password']))
  {
    echo "Le champ Mot de passe est vide.";
  }
  else
  {
    // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
    $utilisateur = htmlentities($_POST['mail'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
    $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
    //on se connecte à la base de données:
    $bd = mysqli_connect($connexion, $userName, $DBpassword, $DB);
    //$bd = mysqli_connect('localhost', 'root', '', 'test');
    //on vérifie que la connexion s'effectue correctement:
    if(!$bd)
    {
      echo "Erreur de connexion à la base de données.";
    }
    else
    {
      $sql = "SELECT * FROM MEMBRE WHERE mail = '".$utilisateur."' AND password = '".$password."'";
      //echo $qry."<br>";
      // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
      $res = mysqli_query($bd,$sql);//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
      // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
      // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
      //var_dump($Requete);
      if(mysqli_num_rows($res) == 0)
      {
        echo"<script type=\"text/javascript\">";
        echo"swal({ title: 'Dommage ...', text: 'Vos identifiants sont incorrects !', icon: 'error', button: 'Ah OK ...' })";
        echo"</script>";
      }
      else
      {
        echo"<script type=\"text/javascript\">";
        echo"swal('Dommage !', 'Vos identifiants sont incorrects !', 'success')";
        echo"</script>";

        // on ouvre la session avec $_SESSION:
        $_SESSION['nom_util'] = $utilisateur; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
        session_start();
        header("location:compte.php");
      }
    }
  }
}
?>

