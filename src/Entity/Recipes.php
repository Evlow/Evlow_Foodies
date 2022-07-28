<?php

namespace App\Entity;

use App\Repository\RecipesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[UniqueEntity('Title')]
#[ORM\Entity(repositoryClass: RecipesRepository::class)]
#[Vich\Uploadable]

class Recipes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Title;

    #[Vich\UploadableField(mapping: 'recipe_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable:true)]
    private ?string $imageName = null;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $ingredient_1;

    #[ORM\Column(type: 'string', length: 255)]
    private $ingredient_2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_5;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_4;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_6;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_7;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_8;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_9;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_10;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_11;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_12;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_13;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_14;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $ingredient_15;

    #[ORM\Column(type: 'string', length: 255)]
    private $preparation_1;

    #[ORM\Column(type: 'string', length: 255)]
    private $preparation_2;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $preparation_3;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $preparation_4;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $preparation_5;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'recipes')]
    #[ORM\JoinColumn(nullable: false)]
    private $Category;

    #[ORM\ManyToOne(targetEntity: category::class, inversedBy: 'categorie')]
    #[ORM\JoinColumn(nullable: false)]
    private $category;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setCreatedAd(\DateTimeInterface $createdAd): self
    {
        $this->createdAd = $createdAd;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getIngredient1(): ?string
    {
        return $this->ingredient_1;
    }

    public function setIngredient1(string $ingredient_1): self
    {
        $this->ingredient_1 = $ingredient_1;

        return $this;
    }

    public function getIngredient2(): ?string
    {
        return $this->ingredient_2;
    }

    public function setIngredient2(string $ingredient_2): self
    {
        $this->ingredient_2 = $ingredient_2;

        return $this;
    }

    public function getIngredient3(): ?string
    {
        return $this->ingredient_3;
    }

    public function setIngredient3(?string $ingredient_3): self
    {
        $this->ingredient_3 = $ingredient_3;

        return $this;
    }

    public function getIngredient5(): ?string
    {
        return $this->ingredient_5;
    }

    public function setIngredient5(?string $ingredient_5): self
    {
        $this->ingredient_5 = $ingredient_5;

        return $this;
    }

    public function getIngredient4(): ?string
    {
        return $this->ingredient_4;
    }

    public function setIngredient4(?string $ingredient_4): self
    {
        $this->ingredient_4 = $ingredient_4;

        return $this;
    }

    public function getIngredient6(): ?string
    {
        return $this->ingredient_6;
    }

    public function setIngredient6(?string $ingredient_6): self
    {
        $this->ingredient_6 = $ingredient_6;

        return $this;
    }

    public function getIngredient7(): ?string
    {
        return $this->ingredient_7;
    }

    public function setIngredient7(?string $ingredient_7): self
    {
        $this->ingredient_7 = $ingredient_7;

        return $this;
    }

    public function getIngredient8(): ?string
    {
        return $this->ingredient_8;
    }

    public function setIngredient8(?string $ingredient_8): self
    {
        $this->ingredient_8 = $ingredient_8;

        return $this;
    }

    public function getIngredient9(): ?string
    {
        return $this->ingredient_9;
    }

    public function setIngredient9(?string $ingredient_9): self
    {
        $this->ingredient_9 = $ingredient_9;

        return $this;
    }

    public function getIngredient10(): ?string
    {
        return $this->ingredient_10;
    }

    public function setIngredient10(?string $ingredient_10): self
    {
        $this->ingredient_10 = $ingredient_10;

        return $this;
    }

    public function getIngredient11(): ?string
    {
        return $this->ingredient_11;
    }

    public function setIngredient11(?string $ingredient_11): self
    {
        $this->ingredient_11 = $ingredient_11;

        return $this;
    }

    public function getIngredient12(): ?string
    {
        return $this->ingredient_12;
    }

    public function setIngredient12(?string $ingredient_12): self
    {
        $this->ingredient_12 = $ingredient_12;

        return $this;
    }

    public function getIngredient13(): ?string
    {
        return $this->ingredient_13;
    }

    public function setIngredient13(?string $ingredient_13): self
    {
        $this->ingredient_13 = $ingredient_13;

        return $this;
    }

    public function getIngredient14(): ?string
    {
        return $this->ingredient_14;
    }

    public function setIngredient14(?string $ingredient_14): self
    {
        $this->ingredient_14 = $ingredient_14;

        return $this;
    }

    public function getIngredient15(): ?string
    {
        return $this->ingredient_15;
    }

    public function setIngredient15(?string $ingredient_15): self
    {
        $this->ingredient_15 = $ingredient_15;

        return $this;
    }

    public function getPreparation1(): ?string
    {
        return $this->preparation_1;
    }

    public function setPreparation1(string $preparation_1): self
    {
        $this->preparation_1 = $preparation_1;

        return $this;
    }

    public function getPreparation2(): ?string
    {
        return $this->preparation_2;
    }

    public function setPreparation2(string $preparation_2): self
    {
        $this->preparation_2 = $preparation_2;

        return $this;
    }

    public function getPreparation3(): ?string
    {
        return $this->preparation_3;
    }

    public function setPreparation3(?string $preparation_3): self
    {
        $this->preparation_3 = $preparation_3;

        return $this;
    }

    public function getPreparation4(): ?string
    {
        return $this->preparation_4;
    }

    public function setPreparation4(?string $preparation_4): self
    {
        $this->preparation_4 = $preparation_4;

        return $this;
    }

    public function getPreparation5(): ?string
    {
        return $this->preparation_5;
    }

    public function setPreparation5(?string $preparation_5): self
    {
        $this->preparation_5 = $preparation_5;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    
}
