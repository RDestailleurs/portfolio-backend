<?php

namespace App\Entity;

use App\Repository\ContenuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenuRepository::class)
 */
class Contenu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idObjet8;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdObjet1(): ?string
    {
        return $this->idObjet1;
    }

    public function setIdObjet1(?string $idObjet1): self
    {
        $this->idObjet1 = $idObjet1;

        return $this;
    }

    public function getIdObjet2(): ?string
    {
        return $this->idObjet2;
    }

    public function setIdObjet2(?string $idObjet2): self
    {
        $this->idObjet2 = $idObjet2;

        return $this;
    }

    public function getIdObjet3(): ?string
    {
        return $this->idObjet3;
    }

    public function setIdObjet3(?string $idObjet3): self
    {
        $this->idObjet3 = $idObjet3;

        return $this;
    }

    public function getIdObjet4(): ?string
    {
        return $this->idObjet4;
    }

    public function setIdObjet4(?string $idObjet4): self
    {
        $this->idObjet4 = $idObjet4;

        return $this;
    }

    public function getIdObjet5(): ?string
    {
        return $this->idObjet5;
    }

    public function setIdObjet5(?string $idObjet5): self
    {
        $this->idObjet5 = $idObjet5;

        return $this;
    }

    public function getIdObjet6(): ?string
    {
        return $this->idObjet6;
    }

    public function setIdObjet6(?string $idObjet6): self
    {
        $this->idObjet6 = $idObjet6;

        return $this;
    }

    public function getIdObjet7(): ?string
    {
        return $this->idObjet7;
    }

    public function setIdObjet7(?string $idObjet7): self
    {
        $this->idObjet7 = $idObjet7;

        return $this;
    }

    public function getIdObjet8(): ?string
    {
        return $this->idObjet8;
    }

    public function setIdObjet8(?string $idObjet8): self
    {
        $this->idObjet8 = $idObjet8;

        return $this;
    }
}
