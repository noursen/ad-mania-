<?php
class Event {
    private ?int $reference = null;
    private ?string $nom = null;
    private ?string $theme = null;
    private ?string $da = null;
    private ?string $organisateur = null;
    private ?string $description = null;
    private ?string $datefin = null;

function __construct(string $nom, string $theme, string $organisateur, string $da, string $description, string $datefin){
			
    $this->nom=$nom;
    $this->theme=$theme;
    $this->organisateur=$organisateur;
    $this->da=$da;
    $this->description=$description;
    $this->datefin=$datefin;
}
function getref(): int{
    return $this->reference;
}
function getnom(): string{
    return $this->nom;
}
function getdescription(): string{
    return $this->description;
}
function getdatefin(): string{
    return $this->datefin;
}
function getorganisateur(): string{
    return $this->organisateur;
}
function gettheme(): string{
    return $this->theme;
}
function getda(): string{
    return $this->da;
}
function setNom(string $nom): void{
    $this->nom=$nom;
}
function setDescription(string $description): void{
    $this->description=$description;
}
function setDatefin(string $datefin): void{
    $this->datefin=$datefin;
}
function settheme(string $theme): void{
    $this->theme=$theme;
}
function setorganisateur(string $organisateur): void{
    $this->organisateur=$organisateur;
}
function setref(int $reference): void{
    $this->reference=$reference;
}
function setdate(string $da): void{
    $this->da=$da;
}
}
?>