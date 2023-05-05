<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Bakery::class, mappedBy="product")
     */
    private $bakeries;

    /**
     * @ORM\ManyToMany(targetEntity=Order::class, inversedBy="products")
     */
    private $order_;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="product")
     */
    private $categories;

    public function __construct()
    {
        $this->bakeries = new ArrayCollection();
        $this->order_ = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Bakery>
     */
    public function getBakeries(): Collection
    {
        return $this->bakeries;
    }

    public function addBakery(Bakery $bakery): self
    {
        if (!$this->bakeries->contains($bakery)) {
            $this->bakeries[] = $bakery;
            $bakery->addProduct($this);
        }

        return $this;
    }

    public function removeBakery(Bakery $bakery): self
    {
        if ($this->bakeries->removeElement($bakery)) {
            $bakery->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrder(): Collection
    {
        return $this->order_;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->order_->contains($order)) {
            $this->order_[] = $order;
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        $this->order_->removeElement($order);

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setProduct($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getProduct() === $this) {
                $category->setProduct(null);
            }
        }

        return $this;
    }

}
