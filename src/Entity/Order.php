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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="orders")
     * 
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=OrderProduct::class, mappedBy="order", fetch="EXTRA_LAZY")
     * 
     * @Groups({"order_list"})
     * @Groups({"order_read"})
     */
    private $orderProducts;

    public function __construct()
    {
        $this->orderProducts = new ArrayCollection();
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


    /**
     * @return Collection<int, OrderProduct>
     */
    public function getOrderProducts(): Collection
    {
        return $this->orderProducts;
    }

    public function addOrderProduct(OrderProduct $orderProduct): self
    {
        if (!$this->orderProducts->contains($orderProduct)) {
            $this->orderProducts[] = $orderProduct;
            $orderProduct->setOrder($this);
        }

        return $this;
    }

    public function removeOrderProduct(OrderProduct $orderProduct): self
    {
        if ($this->orderProducts->removeElement($orderProduct)) {
            // set the owning side to null (unless already changed)
            if ($orderProduct->getOrder() === $this) {
                $orderProduct->setOrder(null);
            }
        }

        return $this;
    }

}
