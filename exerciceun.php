      <?php if(!isset($_SESSION['login'])) 
{
echo 'Veuillez inscrire un nom avant de commencer';
}
else
{
?> <h1>Exercice 1</h1>
        <p>
		<h2><div id="bip" class="display"></div></h2>
		<form name="bayanat" action = "#" method = "post"> 
<p align="right">Total De Clics = &nbsp;<font face="Verdana, Arial" size=1><input readOnly size=6 value=0 name=TTclics style="border: 1px solid #FFFFFF; color:#FF0000; font-weight:bold; background-color:#F1EFE2">
<input oncontextmenu="clicsdroit();" onmouseup="comptclick();" type="reset" value="Rétablir" name="B2">
<?php echo 'Clic'.$_POST['TTclics'];?>

<table cellpadding="3" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber3"> 
<tr> 
<td  id="Texte1" oncontextmenu="clicsdroit();" onmouseup="comptclick(); objets(Texte1)" width="13%" align="center" style="cursor:pointer"> 
<u>
<div id="affiche"></div>
</u>
</td>
</tr></form></table>

<p><a onclick="start()" class="btn btn-primary btn-lg" role="button">Lancer l'exercice</a></p> ------------------------------------------------------------ <p><a class="btn btn-primary btn-lg" role="button">Voir l'exercice 2</a></p>


<script>
var counter = 20;
var intervalId = null;
function action()
{
  clearInterval(intervalId);
  document.getElementById("bip").innerHTML = "TERMINE!";
  document.getElementById("affiche").innerHTML = '<input type="submit" value="Envoyer Résultat" />';
  document.form.TTclics.disabled=true;
document.getElementById('moncercle').style.visibility='hidden';
}
function bip()
{
  document.getElementById("bip").innerHTML = counter + " secondes restantes";
  document.getElementById("affiche").innerHTML = '<div id="moncercle"></div>';
  counter--;
}
function start()
{
  intervalId = setInterval(bip, 1000);
  setTimeout(action, counter * 1000);
}	
</script>
<?php
}
?>