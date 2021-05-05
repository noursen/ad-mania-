<?php  include_once "../Model/Organisateur.php";

include_once "../config.php";
require_once '../Model/Organisateur.php';
class OrganisateurC{
  function ajouterOrganisateur($Organisateur) {
    $sql="INSERT INTO organisateur (nom,tel,email,type) 
    VALUES (:nom, :tel, :email, :type)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $Organisateur->getnom(),
           
            'tel' => $Organisateur->gettel(),
            'email' => $Organisateur->getemail(),
            'type' => $Organisateur->gettype()
            
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		

}
public function afficherOrganisateur()
{
    $sql="select * from organisateur";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
 public function afficherOrganisateurDetail(int $rech1)
 {
     $sql="select * from organisateur where id=".$rech1."";
     
     $db = config::getConnexion();
     try{
         $liste = $db->query($sql);
         return $liste;
     }
     catch(Exception $e){
         die('Erreur: '.$e->getMessage());
     }
 }
 public function afficherOrganisateurRech(string $rech1)
 {
     $sql="select * from organisateur where id like '".$rech1."%'";
     
     $db = config::getConnexion();
     try{
         $liste = $db->query($sql);
         return $liste;
     }
     catch(Exception $e){
         die('Erreur: '.$e->getMessage());
     }
 }

 public function supprimerOrganisateur($id)
 {
     $sql = "DELETE FROM organisateur WHERE id=".$id."";
     $db = config::getConnexion();
     $query =$db->prepare($sql);
     /*$query->bindValue(':reference',$reference);*/
     try {
         $query->execute();
     }
     catch(Exception $e){
         die('Erreur: '.$e->getMessage());

     }
 }

 function modifierOrganisateur($id,$Organisateur) {
     $sql="UPDATE  organisateur set nom=:nom,tel=:tel,email=:email,type=:type  where id=".$id."";
     $db = config::getConnexion();
     try{
         $query = $db->prepare($sql);
     
         $query->execute([
            'nom' => $Organisateur->getnom(),
            'tel' => $Organisateur->gettel(),
            'email' => $Organisateur->getemail(),
            'type' => $Organisateur->gettype()
            
         ]);			
     }
     catch (Exception $e){
         echo 'Erreur: '.$e->getMessage();
     }		

 }


 public function afficherjoin(string $nom)
 {
     $sql="select * from organisateur where id like '".$rech1."%'";
     
     $db = config::getConnexion();
     try{
         $liste = $db->query($sql);
         return $liste;
     }
     catch(Exception $e){
         die('Erreur: '.$e->getMessage());
     }
 }






 
}


?>