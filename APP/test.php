<?php
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