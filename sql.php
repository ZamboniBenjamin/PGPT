<?php
$PARAM_hote='host'; // le chemin vers le serveur
$PARAM_port='3306';
$PARAM_nom_bd='dbb'; // le nom de votre base de données
$PARAM_utilisateur='user'; // nom d'utilisateur pour se connecter
$PARAM_mot_passe='pass'; // mot de passe de l'utilisateur pour se connecter
try
{
        $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
 
catch(Exception $e)
{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
}
?>