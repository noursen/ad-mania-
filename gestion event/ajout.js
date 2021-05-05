function verif() {

var nom=document.getElementById('nom').value;
var theme=document.getElementById('theme').value;
var organisateur=document.getElementById('organisateur').value;
var date=document.getElementById('date').value;
var datefin=document.getElementById('datefin').value;
var descriptin=document.getElementById('description');
var today = new Date();
var annee=date.substring(0,4); console.log(annee);
var mois=date.substring(5,2);
var jour=date.substring(8,2);

if (nom.length === 0 || theme.length === 0 || organisateur.length===0 || date.length ===0 || datefin.length ===0 || descriptin.length ===0) {
    alert("Vérifier votre nom  votre theme votre date votre desc..... ");
}
else {
if (nom.length >15)
{
    alert("Votre nom doit avoir une longueur inférieur à 15 caractères");
}
else {

if (theme.length >15)
{
    alert("Votre theme doit avoir une longueur inférieur à 15 caractères");
}

else{

if (organisateur.length >25)
{
    alert("Votre organisateur doit avoir une longueur inférieur à 25 caractères");
}

else { 
   if (descriptin.length >50)
{
    alert("Votre descriptiion doit avoir une longueur inférieur à 50 caractères");
}
else { if(parseInt(annee)<= parseInt(today.getFullYear()))
    {
        alert("verifier votre annee");
    }


else{ if(parseInt(mois)<= parseInt(today.getMonth()))
    {
        alert("verifier votre mois");
    }

    else {if(parseInt(jour)<= parseInt(today.getDate()))
        {
            alert("verifier votre jour");
        }





    }
}
}
}
}
}
}














}