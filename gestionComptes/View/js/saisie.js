function verif() {
    var nom=document.getElementById('nom').value;
    var numtel=document.getElementById('numtel').value;
    var email=document.getElementById('email').value;
    var mdp=document.getElementById('mdp').value;
    var role=document.getElementById('role').value;
    if (nom.length === 0 || numtel.length === 0 || email.length===0 || mdp.length ===0 || role.length ===0) {
        alert("Tous les champs doivent etre remplis... ");
    }
    
   else if (nom.length >15)
    {
        alert("le nom doit avoir une longueur inférieur à 15 caractères")
    }
   
    
  else if (numtel.length != 8)
    {
        alert("le numero doit avoir une longueur de 8");
    }
    
   else  if (mdp.length >50)
    {
        alert("Votre descriptiion doit avoir une longueur inférieur à 50 caractères");
    }
    
}
    
