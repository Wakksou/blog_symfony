<?php

namespace App\Entity;

use App\Repository\QuantitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuantitesRepository::class)]
class Quantites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quantites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?recette $recette = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ingredient $ingredient = null;

    #[ORM\Column(length: 255)]
    private ?string $quantites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecette(): ?recette
    {
        return $this->recette;
    }

    public function setRecette(?recette $recette): static
    {
        $this->recette = $recette;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): static
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function getQuantites(): ?string
    {
        return $this->quantites;
    }

    public function setQuantites(string $quantites): static
    {
        $this->quantites = $quantites;

        return $this;
    }
}
