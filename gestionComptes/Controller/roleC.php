<?php
include_once "../config.php";
require_once '../Model/role.php';
class roleC{
    function ajouterRole($role){
        $sql="insert into role(nom,niveau,salaire) values(:nom,:niveau,:salaire)";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
            'nom'=>$role->getNom(),
            'niveau'=>$role->getNiveau(),
            'salaire'=>$role->getSalaire(),
            
            ]);
            
        }
            catch(Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
    }
    function afficherRole(){
        $sql="select * from role";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherroleTrie(string $selon){
    $sql="select * from role order by ".$selon."";
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

public function supprimerRole($ref)
{
    $sql = "DELETE FROM role WHERE reference=".$ref."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
public function afficherRoleDetail(int $rech1)
    {
        $sql="select * from role where reference=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierRole($ref,$role) {
        $sql="UPDATE  role set nom=:nom,niveau=:niveau,salaire=:salaire where reference=".$ref."";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                'nom' => $role->getNom(),
                'niveau' => $role->getNiveau(),
                'salaire' => $role->getSalaire(),
               
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }		
      }
      public function afficherRoleRech(string $rech1)
      {
          $sql="select * from role where reference like '".$rech1."%'";
          
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