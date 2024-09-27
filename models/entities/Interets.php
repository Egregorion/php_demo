<?php 

class Interets 
{
    private $id;
    private $nom_interet;

    function getId()
    {
        return $this->id;
    }

    function getNom_interet()
    {
        return $this->nom_interet;
    }

    function setNom_interet($nom_interet)
    {
        $this->nom_interet = $nom_interet;
    }
}