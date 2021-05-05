<?php
class Organisateur {
    private ?int $id = null;
    private ?string $nom = null;
   
    private ?string $type = null;
    private ?string $email = null;
    private ?int $tel = null;
    

function __construct(string $nom,  string $email, string $type, string $tel){
			
    $this->nom=$nom;
   
    $this->email=$email;
    $this->type=$type;
    $this->tel=$tel;
    
}
function getdatefin(): int{
    return $this->id;
}
function getnom(): string{
    return $this->nom;
}

function gettype(): string{
    return $this->type;
}
function gettel(): int{
    return $this->tel;
}
function getemail(): string{
    return $this->email;
}

function setNom(string $nom): void{
    $this->nom=$nom;
}

function setType(string $type): void{
    $this->type=$type;
}
function setEmail(string $email): void{
    $this->email=$email;
}
function setTel(int $tel): void{
    $this->tel=$tel;
}
function setId(int $id): void{
    $this->id=$id;
}

}
?>