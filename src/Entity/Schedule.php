<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $day;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $openMorning;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closeMorning;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $openAfternoon;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closeAfternoon;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Bakery::class, mappedBy="schedule")
     */
    private $bakeries;

    public function __construct()
    {
        $this->bakeries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getOpenMorning(): ?\DateTimeInterface
    {
        return $this->openMorning;
    }

    public function setOpenMorning(?\DateTimeInterface $openMorning): self
    {
        $this->openMorning = $openMorning;

        return $this;
    }

    public function getCloseMorning(): ?\DateTimeInterface
    {
        return $this->closeMorning;
    }

    public function setCloseMorning(?\DateTimeInterface $closeMorning): self
    {
        $this->closeMorning = $closeMorning;

        return $this;
    }

    public function getOpenAfternoon(): ?\DateTimeInterface
    {
        return $this->openAfternoon;
    }

    public function setOpenAfternoon(?\DateTimeInterface $openAfternoon): self
    {
        $this->openAfternoon = $openAfternoon;

        return $this;
    }

    public function getCloseAfternoon(): ?\DateTimeInterface
    {
        return $this->closeAfternoon;
    }

    public function setCloseAfternoon(?\DateTimeInterface $closeAfternoon): self
    {
        $this->closeAfternoon = $closeAfternoon;

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
            $bakery->setSchedule($this);
        }

        return $this;
    }

    public function removeBakery(Bakery $bakery): self
    {
        if ($this->bakeries->removeElement($bakery)) {
            // set the owning side to null (unless already changed)
            if ($bakery->getSchedule() === $this) {
                $bakery->setSchedule(null);
            }
        }

        return $this;
    }
}
