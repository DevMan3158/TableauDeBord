<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'integer')]
    private $id_cat;

    #[ORM\Column(type: 'string', length: 255)]
    private $lieux_achat;

    #[ORM\Column(type: 'datetime')]
    private $date_achat;

    #[ORM\Column(type: 'integer')]
    private $date_fin_garantie;

    #[ORM\Column(type: 'float')]
    private $prix;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $photo;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $category;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Photo::class)]
    private $photos;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
    }

    private $facture;

    public function getBrochureFilename() {
        return $this->photos;
    }

    public function setBrochureFilename($photos) {
        $this->photos = $photos;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getIdCat(): ?int
    {
        return $this->id_cat;
    }

    public function setIdCat(int $id_cat): self
    {
        $this->id_cat = $id_cat;

        return $this;
    }

    public function getLieuxAchat(): ?string
    {
        return $this->lieux_achat;
    }

    public function setLieuxAchat(string $lieux_achat): self
    {
        $this->lieux_achat = $lieux_achat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(\DateTimeInterface $date_achat): self
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getDateFinGarantie(): ?int
    {
        return $this->date_fin_garantie;
    }

    public function setDateFinGarantie(int $date_fin_garantie): self
    {
        $this->date_fin_garantie = $date_fin_garantie;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?int
    {
        return $this->photo;
    }

    public function setPhoto(int $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setProduit($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getProduit() === $this) {
                $photo->setProduit(null);
            }
        }

        return $this;
    }
}
