<?php

use Doctrine\ORM\Mapping as ORM;

/** @Entity @Table(name="billets") **/
class Billets {

    /** @Id @Column(type="integer") @GeneratedValue **/  //// auto incrémentaion
    protected $id;
    /** @Column(type="string", length=255) **/
    protected $titre;
    /** @Column(type="string", length=255) **/
    protected $texte;
    /**
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(nullable=false)
     **/
    protected $proprietaire;

    //// C'est l'entitée utilisateur complète qu'on lie

    /**
     * GET id
     *
     * @return id
     **/
    public function getId() {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $texte
     * @return Billets
     **/
    public function setTexte($texte){
        $this->texte = $texte;
        return $this;
    }

    /**
     * Get texte
     *
     * @return texte
     **/
    public function getTexte(){
        return $this->texte;
    }

    public function getProprietaire(){
        return $this->proprietaire;
    }


    public function setProprietaire($proprietaire){
        $this->proprietaire = $proprietaire;
        return $this;
    }

    /**
     * Set titre.
     *
     * @param string $titre
     *
     * @return Billets
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre.
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
}
