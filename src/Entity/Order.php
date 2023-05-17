<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OrderRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"order_show"})
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"order_show"})
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     * 
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"order_show"})
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     * 
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"order_read"})
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $delivery;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"order_show"})
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $schedule;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"order_read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="orders")
     * 
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     * 
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $user;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function isDelivery(): ?bool
    {
        return $this->delivery;
    }

    public function setDelivery(bool $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): self
    {
        $this->schedule = $schedule;

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
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addOrder($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            $product->removeOrder($this);
        }

        return $this;
    }

}
