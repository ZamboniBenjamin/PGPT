clics = 0; 

function comptclick() 
{ 
clics ++ 
document.bayanat.TTclics.value = (clics); 
document.getElementById("totalclics").innerHTML = clics;
}
Droite = 0;
function clicsdroit() 
{
Droite ++ 
document.bayanat.TTDroite.value = (Droite); 
clics = clics-1
document.bayanat.TTclics.value = (clics);
} 
function objets(o)
{
document.bayanat.T1.value = o.id;
}
