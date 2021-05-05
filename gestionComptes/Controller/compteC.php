<?php
include_once "../config.php";
include_once("C:/xampp/htdocs/project/gestionComptes/Model/compte.php");
class compteC{
    function ajouterCompte($compte){
        $sql="insert into compte(nom,numtel,email,mdp,role) values(:nom,:numero,:email,:mdp,:role)";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
            'nom'=>$compte->getNom(),
            'numero'=>$compte->getNumero(),
            'email'=>$compte->getEmail(),
            'mdp'=>$compte->getMdp(),
            'role'=>$compte->getRole()
            ]);
            
        }
            catch(Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
    }
    function afficherCompte(){
        $sql="select * from compte";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherCompteTrie(string $selon){
    $sql="select * from compte order by ".$selon."";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function afficherJoin(){
    $sql="SELECT * FROM role INNER JOIN compte ON compte.role = role.nom";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}

public function supprimerCompte($id)
{
    $sql = "DELETE FROM compte WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
public function afficherCompteDetail(int $rech1)
    {
        $sql="select * from compte where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierCompte($id,$compte) {
        $sql="UPDATE  compte set nom=:nom,numtel=:numtel,email=:email,mdp=:mdp,role=:role where id=".$id."";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'nom' => $compte->getNom(),
                'numtel' => $compte->getNumero(),
                'email' => $compte->getEmail(),
                'mdp' => $compte->getMdp(),
                'role' => $compte->getRole()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }		
      }
      function verifierLogin(int $id){
          $sql="select mdp from compte where id=".$id."";
          $db = config::getConnexion();
          try{
              $liste = $db->query($sql);
              return $liste;		
          }
          catch (Exception $e){
              echo 'Erreur: '.$e->getMessage();
          }		
      }
      function setConnected(string $id,string $con) {
        $sql="UPDATE  compte set connected=".$con." where id=".$id."";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute();			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }		
      }
      public function afficherCompteRech(string $rech1)
      {
          $sql="select * from compte where id like '".$rech1."%'";
          
          $db = config::getConnexion();
          try{
              $liste = $db->query($sql);
              return $liste;
          }
          catch(Exception $e){
              die('Erreur: '.$e->getMessage());
          }
      }
      function selectLog(){
        $sql="select * from compte where connected=1";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;		
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }		
    }
}
?>