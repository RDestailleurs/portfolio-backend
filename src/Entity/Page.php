<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Content::class, mappedBy="LinkedPage")
     */
    private $Content1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Year;

    public function __construct()
    {
        $this->Content1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Content>
     */
    public function getContent1(): Collection
    {
        return $this->Content1;
    }

    public function addContent1(Content $content1): self
    {
        if (!$this->Content1->contains($content1)) {
            $this->Content1[] = $content1;
            $content1->setLinkedPage($this);
        }

        return $this;
    }

    public function removeContent1(Content $content1): self
    {
        if ($this->Content1->removeElement($content1)) {
            // set the owning side to null (unless already changed)
            if ($content1->getLinkedPage() === $this) {
                $content1->setLinkedPage(null);
            }
        }

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->Year;
    }

    public function setYear(?int $Year): self
    {
        $this->Year = $Year;

        return $this;
    }
}
