<?php
include 'mdp.inc.php';
//connection avec la base de donnée
$bd = mysqli_connect($connexion, $userName, $DBpassword, $DB);

$target = "photos\ ";
$extension  = 'jpg';
$max_size = 50000000;
$nombre = 0;
$id = '';
$nom_file = 'photo'.$nombre.'.jpg';
$taille = $_FILES['photos']['size'];
    if(!empty($_POST['poster']))
    {
        if(!empty($_FILES['photos']['name']))
        {
            if(move_uploaded_file($_FILES['photos']['tmp_name'],$target.$_FILES['photos']['name']))
            {
                rename('photos\$_FILES['photos']['tmp_name']', 'photos\test.jpg');
                ?>
                <p class="text_imp">La photo a été envoyée avec succès&nbsp;!</p>
                <p>
                    <span class="bold">Fichier&nbsp;:</span> <span class="red"><?php echo $_FILES['photos']['name']; ?></span><br />
                    <span class="bold">Taille&nbsp;:</span> <span class="red"><?php echo $_FILES['photos']['size']; ?></span>
                </p>
                <?php
            }
            else
            {
                ?>
                <p class="text_imp">Problème lors du téléchargement de la photo&nbsp;!</p>
                <p><span class="bold">Erreur à communiquer au Webmaster&nbsp;:</span> <span class="red"><?php echo $_FILES['photos']['error']; ?></span></p>
                <?php
            }
        }
        else
        {
            ?>
            <p class="text_imp">Le champ du formulaire correspondant au nom de la photo est vide&nbsp;!<br />
            Merci de contacter le webmaster pour signaler cette erreur</p>
            <?php
        }
    }
?>

<!-- zone de test -->

<?php
/*
include 'mdp.inc.php';
//connection avec la base de donnée
$bd = mysqli_connect($connexion, $userName, $DBpassword, $DB);

$nombre = 0;
$id = '';
$nom_file = 'photo'.$nombre.'.jpg';
$res = mysqli_query($bd, 'SELECT id_photo FROM PHOTO');
while($row = mysqli_fetch_assoc($res))
{
    $id = $row['id_photo'];
    if ($nombre == $id)
    {
        $nombre++;
        $nom_file = 'photo'.$nombre.'.jpg';
        echo 'debug1'.'</br>';
    }
}
echo 'debug2'.'</br>';
echo '</br>'.$nombre;
*/
?>