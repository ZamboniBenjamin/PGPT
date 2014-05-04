<?php

header('Content-type: text/html; charset=UTF-8');


$message = null;


$pseudo = filter_input(INPUT_POST, 'pseudo');


if (isset($pseudo)) 
{   

    $pseudo = trim($pseudo) != '' ? $pseudo : null;
  
   


        if(isset($pseudo)) 

                      $hostname = "hot";
                $database = "dbb";
                $username = "user";
                $password = "pass";
                

                

                $pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;
                

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                

                $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
                

                try
                {
                        $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, $pdo_options);
                }
                catch (PDOException $e)
                {
                        exit('problème de connexion à la base');
                }
                                
                

                $requete = "SELECT count(*) FROM pgpt WHERE nom = ?";
                
                try
                {

                        $req_prep = $connect->prepare($requete);
                        

                        $req_prep->execute(array(0=>$pseudo));
                        

                        $resultat = $req_prep->fetchColumn();
                        
                        if ($resultat == 0) 

                        {

                                $insertion = "INSERT INTO pgpt(exerciceun,nom) VALUES(:exerciceun, :nom)";
                                

                                $insert_prep = $connect->prepare($insertion);
                                

                                $inser_exec = $insert_prep->execute(array(':exerciceun'=>0,':nom'=>$pseudo));
                                

                                if ($inser_exec === true) 
                                {

                                        if (!session_id()) session_start();
                                        $_SESSION['login'] = $pseudo;

                                        $message = 'Votre inscription est enregistrée.';

                                        header("Location: index.php");
                                        exit();  
                                }   
                        }
                        else
                        {  
                                $message = 'Ce pseudo est déjà utilisé, changez-le.';
                        }
                }
                catch (PDOException $e)
                {
                        $message = 'Problème dans la requête d\'insertion';
                }       
        }
        else 
        { 
                $message = 'Les champs Pseudo et Mot de passe doivent être remplis.';
        }
}
?>
    <p id = "message"><?= $message?:'' ?></p>
