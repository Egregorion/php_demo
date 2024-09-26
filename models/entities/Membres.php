<?php 

class Membres 
{
    private $id;
    private $nom;
    private $prenom;
    private $picture;
    private $date_de_naissance;
    private $role_id; 

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom; 
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getDate_de_Naissance()
    {
        return $this->date_de_naissance;
    }

    public function setDate_de_naissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;
    }

    public function getRole_id()
    {
        return $this->role_id;
    }

    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;
    }
}