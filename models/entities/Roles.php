<?php 

class Roles 
{
    private $id;
    private $nom_role;

    function getId()
    {
        return $this->id;
    }

    function getNom_role()
    {
        return $this->nom_role;
    }

    function setNom_role($nom_role)
    {
        $this->nom_role = $nom_role;
    }
}