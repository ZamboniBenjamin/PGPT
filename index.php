<?php session_start();
include 'sql.php';	
$pseudo = $_SESSION['login'];
$requete = "SELECT * FROM pgpt WHERE nom = :nom";  
$req_prep = $connexion->prepare($requete);
$req_prep->execute(array(':nom'=>$pseudo));
$resultat = $req_prep->fetchAll(); 
$result = $resultat[0];
$exerciceun = $result['exerciceun'];
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="cercle.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
 <script src="js/clic.js"></script>		
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PGPT</a>
        </div>
      </div>
    </div>
<?php
$totalclic = $_POST['TTclics'] -1;
 $sql = "UPDATE pgpt SET exerciceun=? WHERE nom=?";
$q = $connexion->prepare($sql);
$q->execute(array($totalclic,$result['nom']));

?>
    <div class="jumbotron">
      <div class="container">
	  Pseudo : <?php echo $result['nom']; ?>

		<?php
if(!isset($_SESSION['login'])) 
{
echo '
    <form action = "formul.php" method = "post">
    <p><label for = "pseudo">Pseudo : </label><input type = "text" name = "pseudo" id = "pseudo" /></p>
    <p><input type = "submit" value = "Envoyer" id = "valider" /></p>
    </form>
';
}
else
{
echo ' <a href="?load=exerciceun">Exercice 1 </a><a href="?load=deco">Déco</a>';
}
if($_GET['load'] == 'deco')
{

session_start ();

session_unset ();

session_destroy ();

                                        header("Location: index.php");
                                        exit(); 
}
?>


  <?php
    $load = $_GET['load'].'.php';
    if (file_exists($load)) include_once($load);
    else include_once('accueil.php');
?>
      </div>
    </div>

    <div class="container">
      <hr>

      <footer>
        <p>&copy; ProGaming Physical Training 2014.</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
