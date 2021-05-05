function verif() {

    var email=document.getElementById('email').value;
    var tel=document.getElementById('tel').value;
    var type=document.getElementById('type').value;
    var nom=document.getElementById('nom').value;
    if (nom.length == 0 || type.length == 0 || tel.length == 0 || email.length == 0 ) {
        alert("Vérifier votre nom  votre tel votre email votre type..... ");
    }
  else{
    if (tel.substring(0, 1) != '7' || tel.length != 8) {
        alert("numéro de tel erroné");
    }
}




}