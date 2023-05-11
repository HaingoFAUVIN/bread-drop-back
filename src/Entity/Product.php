<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"product_show"})
     * @Groups({"product_list"})
     * @Groups({"product_read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"product_show"})
     * @Groups({"product_list"})
     * @Groups({"product_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"product_show"})
     * @Groups({"product_list"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"product_list"})
     * @Groups({"product_read"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"product_show"})
     * @Groups({"product_list"})
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
     * 
     * @Groups({"product_list"})
     */
    private $bakeries;

    /**
     * @ORM\ManyToMany(targetEntity=Order::class, inversedBy="products")
     */
    private $order_;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
<<<<<<< HEAD
     * 
     * @Groups({"product_show"})
     * @Groups({"product_list"})
=======
>>>>>>> feature/fixture
     */
    private $category;

    public function __construct()
    {
        $this->bakeries = new ArrayCollection();
        $this->order_ = new ArrayCollection();
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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

}