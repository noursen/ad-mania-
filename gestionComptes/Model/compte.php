<?php
class compte{
    private ?int $id = null;
    private ?string $nom = null;
    private ?int $numero = null;
    private ?string $email = null;
    private ?string $mdp = null;
    private ?string $role = null;
    function __construct(string $nom,int $numero,string $email,string $mdp,string $role)
    {
        
        $this->nom=$nom;
        $this->numero=$numero;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->role=$role;
    }
    function getId(): int{
        return $this->id;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getNumero(): int{
        return $this->numero;
    }
    function getEmail(): string{
        return $this->email;
    }
    function getMdp(): string{
        return $this->mdp;
    }
    function getRole(): string{
        return $this->role;
    }
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setPrenom(string $prenom): void{
        $this->prenom=$prenom;
    }
    function setEmail(string $email): void{
        $this->email=$email;
    }
    function setMdp(string $mdp): void{
        $this->mdp=$mdp;
    }
    function setRole(string $role): void{
        $this->role=$role;
    }
}
?>