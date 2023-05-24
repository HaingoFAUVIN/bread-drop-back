<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"user_list"})
     * @Groups({"user_add"})
     * @Groups({"user_read"})
     * @Groups({"user_show"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"user_list"})
     * @Groups({"user_read"})
     * @Groups({"user_add"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"user_list"})
     * @Groups({"user_read"})
     * @Groups({"user_add"})
     */
    private $lastname;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * 
     * @Groups({"user_add"})
     * @Groups({"user_read"})
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     * 
     * @Groups({"user_add"})
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"user_list"})
     * @Groups({"user_add"})
     * @Groups({"user_read"})
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * 
     * @Groups({"user_list"})
     * 
     * @Groups({"user_add"})
     * @Groups({"user_read"})
     */
    private $email;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @Groups({"user_read"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     * @Groups({"user_list"})
     * @Groups({"user_read"})
     * @Groups({"user_add"})
     */
    private $picture;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"user_read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @Groups({"user_read"})
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="user")
     * 
     * @Groups({"user_list"})
     * @Groups({"user_read"})
     */
    private $orders;

    /**
     * @ORM\OneToOne(targetEntity=Bakery::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $bakery;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->createdAt = new \DateTime;
        $this->updatedAt = new \DateTime;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // pas besoin, on se débrouille avec nos rôles
        // guarantee every user at least has ROLE_USER
        // $roles[] = 'ROLE_ADMIN';

        return array_unique($roles);
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        //$this->plainPassword = null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

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
	 * Set the value of roles
	 *
	 * @param   mixed  $roles  
	 * @return  self
	 */
	public function setRoles($roles)
                                 	{
                                 		$this->roles = $roles;
                                 
                                 		return $this;
                                 	}

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }

    public function getBakery(): ?Bakery
    {
        return $this->bakery;
    }

    public function setBakery(Bakery $bakery): self
    {
        // set the owning side of the relation if necessary
        if ($bakery->getUser() !== $this) {
            $bakery->setUser($this);
        }

        $this->bakery = $bakery;

        return $this;
    }

}