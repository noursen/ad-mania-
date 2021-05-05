<?php
class role{
    private ?int $ref = null;
    private ?string $nom = null;
    private ?int $niveau = null;
    private ?float $salaire = null;
    
    function __construct(string $nom,int $niveau,float $salaire)
    {
        
        $this->nom=$nom;
        $this->niveau=$niveau;
        $this->salaire=$salaire;
        
    }
    function getRef(): int{
        return $this->ref;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getNiveau(): int{
        return $this->niveau;
    }
    function getSalaire(): float{
        return $this->salaire;
    }
   
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setNiveau(int $niveau): void{
        $this->niveau=$niveau;
    }
    function setSalaire(float $salaire): void{
        $this->salaire=$salaire;
    }
    
}
?>