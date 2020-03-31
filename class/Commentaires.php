<?php

/** @Entity @Table(name="comments") **/

class Commentaires{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    /** @Column(type="string", length=255) **/
    protected $content;
    /**
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(nullable=false)
     **/
    protected $proprietaire;

    //// C'est l'entitée utilisateur complète qu'on lie

    /**
     * @ManyToOne(targetEntity="Billets")
     * @JoinColum(nullable=false)
     */
    protected $billet;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Commentaires
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set proprietaire.
     *
     * @param \Utilisateur $proprietaire
     *
     * @return Commentaires
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire.
     *
     * @return \Utilisateur
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set billet.
     *
     * @param \Billets|null $billet
     *
     * @return Commentaires
     */
    public function setBillet(\Billets $billet = null)
    {
        $this->billet = $billet;

        return $this;
    }

    /**
     * Get billet.
     *
     * @return \Billets|null
     */
    public function getBillet()
    {
        return $this->billet;
    }
}
